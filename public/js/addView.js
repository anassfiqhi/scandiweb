let skuInput = document.querySelector("#sku");
let nameInput = document.querySelector("#name");
let priceInput = document.querySelector("#price");
let typeInput = document.querySelector("#type");
let container = null;

let labelWeight = null;
let inputWeight = null;

let labelSize = null;
let inputSize = null;

let labelHeight = null;
let inputHeight = null;

let labelWidth = null;
let inputWidth = null;

let labelLength = null;
let inputLength = null;

//Capturig the chage in the product to display the right componants

document.querySelector("#type").onchange = function(event) {
    let type = event.currentTarget.value;

    let typeprams = document.querySelector("#typeprams");
    let typemessage = document.querySelector("#typemessage");
    typeprams.innerHTML = "";
    typemessage.innerText = "";

    if (type == "Book") {

        container = document.createElement("div");
        container.classList.add(...["m-5", "grid", "grid-cols-2"]);

        labelWeight = document.createElement("label");
        labelWeight.innerText = "Weight (KG)";
        labelWeight.htmlFor = "weight";
        container.append(labelWeight);


        inputWeight = document.createElement("input");
        inputWeight.id = "weight";
        inputWeight.type = "text";
        inputWeight.required = true;
        inputWeight.pattern = "^[0-9]+([.][0-9])*$";
        inputWeight.classList.add(...["border-black", "border-2", "pl-3"]);
        container.append(inputWeight);


        typeprams.append(container);


        typemessage.innerText = "  “Please, provide weight”  ";


    } else if (type == "Disc") {

        container = document.createElement("div");
        container.classList.add(...["m-5", "grid", "grid-cols-2"]);

        labelSize = document.createElement("label");
        labelSize.innerText = "Size (MB)";
        labelSize.htmlFor = "size";
        container.append(labelSize);


        inputSize = document.createElement("input");
        inputSize.id = "size";
        inputSize.type = "text";
        inputSize.required = true;
        inputSize.pattern = "^[0-9]+([.][0-9])*$";
        inputSize.classList.add(...["border-black", "border-2", "pl-3"]);
        container.append(inputSize);


        typeprams.append(container);


        typemessage.innerText = "  “Please, provide size”  ";


    } else if (type == "Furniture") {

        container = document.createElement("div");
        container.classList.add(...["m-5", "grid", "grid-cols-2"]);

        labelHeight = document.createElement("label");
        labelHeight.innerText = "Height (CM)";
        labelHeight.htmlFor = "height";
        container.append(labelHeight);


        inputHeight = document.createElement("input");
        inputHeight.id = "height";
        inputHeight.type = "text";
        inputHeight.required = true;
        inputHeight.pattern = "^[0-9]+([.][0-9])*$";
        inputHeight.classList.add(...["border-black", "border-2", "pl-3"]);
        container.append(inputHeight);
        typeprams.append(container);



        container = document.createElement("div");
        container.classList.add(...["m-5", "grid", "grid-cols-2"]);

        labelWidth = document.createElement("label");
        labelWidth.innerText = "Width (CM)";
        labelWidth.htmlFor = "width";
        container.append(labelWidth);

        inputWidth = document.createElement("input");
        inputWidth.id = "width";
        inputWidth.type = "text";
        inputWidth.required = true;
        inputWidth.pattern = "^[0-9]+([.][0-9])*$";
        inputWidth.classList.add(...["border-black", "border-2", "pl-3"]);
        container.append(inputWidth);
        typeprams.append(container);


        container = document.createElement("div");
        container.classList.add(...["m-5", "grid", "grid-cols-2"]);

        labelLength = document.createElement("label");
        labelLength.innerText = "Length (CM)";
        labelLength.htmlFor = "length";
        container.append(labelLength);

        inputLength = document.createElement("input");
        inputLength.id = "length";
        inputLength.type = "text";
        inputLength.required = true;
        inputLength.pattern = "^[0-9]+([.][0-9])*$";
        inputLength.classList.add(...["border-black", "border-2", "pl-3"]);
        container.append(inputLength);
        typeprams.append(container);


        typemessage.innerText = "  “Please, provide dimensions”  ";

    }


}

//Adding click event tp send data to "/scandiweb/product/addproduct"
document.querySelector("#save").onclick = function(event) {
    submit.click();
    console.log("Submitted!");
    add('/scandiweb/product/addproduct').then((response) => {
            return response?.text();
        })
        .then((body) => {
            console.log(body?location.href = "/scandiweb/product/list":body);
        });
}


/**
 * @param {String}url
 * @param {Array<string>}skuArray
 * 
 * @return {Promise}
 */
async function add(url) {

    let formData = new FormData();

    if (skuInput.value != "" && nameInput.value != "" && priceInput.value != "" && typeInput.value != "") {

        formData.append('sku', skuInput.value);
        formData.append('name', nameInput.value);
        formData.append('price', priceInput.value);
        formData.append('type', typeInput.value);

        if (typeInput.value == "Book") {

            if (inputWeight.value != "" && parseFloat(inputWeight.value) >= 0 ) {

                formData.append('weight', inputWeight.value);

            } else {
                return;
            }

        } else if (typeInput.value == "Disc") {

            if (inputSize.value != "" && parseFloat(inputSize.value) >= 0 ) {

                formData.append('size', inputSize.value);

            } else {
                return;
            }

        } else if (typeInput.value == "Furniture") {

            if (inputHeight.value != "" && parseFloat( inputHeight.value ) >= 0 && inputWidth.value != "" && parseFloat( inputWidth.value ) >= 0 && inputLength.value != "" && parseFloat(inputLength.value) >= 0 ) {

                formData.append('height', inputHeight.value);
                formData.append('width', inputWidth.value);
                formData.append('length', inputLength.value);

            } else {
                return;
            }


        } else {
            return;
        }

    } else {
        return;
    }


    return await fetch(url, { method: 'POST', body: formData })

}