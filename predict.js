TARGET_CLASSES = {
  0: "COVID",
  1: "Normal"
};

let imageLoaded = false;
$("#image-selector").change(function () {
	imageLoaded = false;
	let reader = new FileReader();
	reader.onload = function () {
		let dataURL = reader.result;
		$("#selected-image").attr("src", dataURL);
		$("#prediction-list").empty();
		imageLoaded = true;
	}

	let file = $("#image-selector").prop('files')[0];
	reader.readAsDataURL(file);
});

let model;
let modelLoaded = false;
$( document ).ready(async function () {
	modelLoaded = false;
	$('.progress-bar').show();
    console.log( "Loading model..." );
    model = await tf.loadLayersModel('model/model.json');
    console.log( "Model loaded." );
    console.log(modelLoaded)
	$('.progress-bar').hide();
	modelLoaded = true;
});

$("#predict-button").click(async function () {
	if (!modelLoaded) { alert("The model must be loaded first"); return; }
	if (!imageLoaded) { alert("Please select an image first"); return; }

	let image = $('#selected-image').get(0);
	console.log( "Loading" );

	let tensor = tf.browser.fromPixels(image, 3)
		.resizeNearestNeighbor([224, 224]) // Resnet takes 224,224
		.toFloat()
		.expandDims();
	let predictions = await model.predict(tensor).data();
	console.log(predictions);
	let top5 = Array.from(predictions)
		.map(function (p, i) {
			return {
				probability: p,
				className: TARGET_CLASSES[i] // we are selecting the value from the obj
			};
		}).sort(function (a, b) {
			return b.probability - a.probability;
		}).slice(0, 2);

	$("#prediction-list").empty();
	top5.forEach(function (p) {
		$("#prediction-list").append(`<li>${p.className}%: ${(p.probability).toFixed(6)*100}%</li>`);
		});
});
