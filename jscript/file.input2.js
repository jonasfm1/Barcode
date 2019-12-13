$(function() {
    var App = {
        init: function() {
            this.overlay = document.querySelectorAll('#interactive canvas.drawing');
            App.attachListeners();
        },
        attachListeners: function() {
            var self = this;

            $(".controls input[type=file]").on("change", function(e) {

                if (e.target.files && e.target.files.length) {
                    var j = 0;

                    while (j < e.target.files.length) {

                        App.decode(e.target.files[j]);

                        var reader = new FileReader();

                        reader.onload = function(e) {
                            var foto = [e.target.result];

                            //$('#imgEnviar').val($('#imgEnviar').val() + ';;' + foto);
                        };

                        reader.readAsDataURL(e.target.files[j]);

                        j++;


                    }

                }

            });

            $(".controls button").on("click", function(e) {



                var input = document.querySelector(".controls input[type=file]");
                if (input.files && input.files.length) {

                    var i = 0;
                    while (i < input.files.length) {

                        App.decode(input.files[i]);
                        i++;

                    }

                }



            });



        },
        _accessByPath: function(obj, path, val) {
            var parts = path.split('.'),
                depth = parts.length,
                setter = (typeof val !== "undefined") ? true : false;

            return parts.reduce(function(o, key, i) {
                if (setter && (i + 1) === depth) {
                    o[key] = val;
                }
                return key in o ? o[key] : {};
            }, obj);
        },
        _convertNameToState: function(name) {
            return name.replace("_", ".").split("-").reduce(function(result, value) {
                return result + value.charAt(0).toUpperCase() + value.substring(1);
            });
        },
        detachListeners: function() {
            $(".controls input[type=file]").off("change");
            $(".controls .reader-config-group").off("change", "input, select");
            $(".controls button").off("click");

        },
        decode: function(file) {

            this.detachListeners();
            var scanner = Quagga
                .config(this.state)
                .fromSource(file, { size: this.state.inputStream.size });
            scanner
                .toPromise()
                .then(function(result) {

                    addToResults(scanner, result);
                    return result;
                })
                .catch(function(result) {
                    console.log('Not found', result);
                    return result;
                })
                .then(function(result) {
                    drawResult(scanner, result);
                    this.attachListeners();
                }.bind(this));
        },
        setState: function(path, value) {
            var self = this;

            if (typeof self._accessByPath(self.inputMapper, path) === "function") {
                value = self._accessByPath(self.inputMapper, path)(value);
            }

            self._accessByPath(self.state, path, value);

            console.log(JSON.stringify(self.state));
            App.detachListeners();
            // App.init();
        },
        inputMapper: {
            inputStream: {
                size: function(value) {
                    return parseInt(value);
                }
            },
            numOfWorkers: function(value) {
                return parseInt(value);
            },
            decoder: {
                readers: function(value) {
                    if (value === 'ean_extended') {
                        return [{
                            format: "ean_reader",
                            config: {
                                supplements: [
                                    'ean_5_reader', 'ean_2_reader'
                                ]
                            }
                        }];
                    }
                    return [{
                        format: value + "_reader",
                        config: {}
                    }];
                }
            }
        },
        state: {
            inputStream: {
                size: 800
            },
            locator: {
                patchSize: "medium",
                halfSample: true
            },
            numOfWorkers: 1,
            decoder: {
                readers: [{
                    format: "i2of5_reader",
                    config: {}
                }]
            },
            locate: true,
            src: null
        }

    };

    App.init();

    function drawResult(scanner, result) {

        var processingCanvas = scanner.getCanvas,
            canvas = App.overlay,
            ctx = processingCanvas.getContext("2d");

        canvas.setAttribute('width', processingCanvas.getAttribute('width'));
        canvas.setAttribute('height', processingCanvas.getAttribute('height'));

        if (result) {
            if (result.boxes) {
                ctx.clearRect(0, 0, parseInt(canvas.getAttribute("width")), parseInt(canvas.getAttribute("height")));
                result.boxes.filter(function(box) {
                    return box !== result.box;
                }).forEach(function(box) {
                    Quagga.ImageDebug.drawPath(box, { x: 0, y: 1 }, ctx, { color: "green", lineWidth: 2 });
                });
            }

            if (result.box) {
                Quagga.ImageDebug.drawPath(result.box, { x: 0, y: 1 }, ctx, { color: "#00F", lineWidth: 2 });
            }

            if (result.codeResult && result.codeResult.code) {
                Quagga.ImageDebug.drawPath(result.line, { x: 'x', y: 'y' }, ctx, { color: 'red', lineWidth: 3 });
            }

            if (App.state.inputStream.area) {
                var area = calculateRectFromArea(canvas, App.state.inputStream.area);
                drawingCtx.strokeStyle = "#0F0";
                drawingCtx.strokeRect(area.x, area.y, area.width, area.height);
            }

        }

    };


    function addToResults(scanner, result) {
        var code = [result.codeResult.code],
            $node;

        var canvas = scanner.getCanvas();

        var faze = document.getElementById('faz')
        var cria = document.getElementById('criando')
        var lis = document.createElement('li')
        cria.appendChild(lis)

        $node = $('<li> <div class="thumbnail"><div class="imgWrapper"><img /></div><div class="caption"><h4 class="code"></h4></div></div></li>');
        $node.find("img").attr("src", canvas.toDataURL('image/jpeg', 1.0));
        $node.find("h4.code").html(code);


        //GERANDO IMAGENS PASSANDO CODIGO COMO ID DE CADA UMA
        var image = new Image();
        image.onload = function() {
            console.log(image.width); // image is loaded and we have image width 
        }
        image.src = canvas.toDataURL('image/jpeg', 1.0);
        image.setAttribute('class', 'imagens');
        image.setAttribute('id', `${code}`); //CRIANDO UM ID COM VALOR DO CODIGO DA IMAGEN


        var pai = document.getElementById('galeria'); //SELECIONANDO MINHA DIV 
        pai.appendChild(image); // PASSANDO IMG PARA DENTRO


        var txto = document.createTextNode(code)
        lis.appendChild(txto)
        $("#result_strip ul.thumbnails").prepend($node);
        //$('#codQr').val(code + ";" + $('#codQr').val());

    };

});