document.querySelector("#type").onchange = function(event) {
    let type = event.currentTarget.value;

    let typeprams = document.querySelector("#typeprams");
    let typemessage = document.querySelector("#typemessage");
    typeprams.innerHTML = "";
    typemessage.innerText = "";

    if (type == "Book") {

        let container = document.createElement("div");
        container.classList.add(...["m-5", "grid", "grid-cols-2"]);

        let labelWeight = document.createElement("label");
        labelWeight.innerText = "Weight (KG)";
        labelWeight.htmlFor = "weight";
        container.append(labelWeight);


        let inputWeight = document.createElement("input");
        inputWeight.id = "weight";
        inputWeight.type = "text";
        inputWeight.required = true;
        inputWeight.pattern = "^[0-9]+([.][0-9])*$";
        inputWeight.classList.add(...["border-black", "border-2", "pl-3"]);
        container.append(inputWeight);


        typeprams.append(container);


        typemessage.innerText = "  “Please, provide weight”  ";


    } else if (type == "Disc") {

        let container = document.createElement("div");
        container.classList.add(...["m-5", "grid", "grid-cols-2"]);

        let labelSize = document.createElement("label");
        labelSize.innerText = "Size (MB)";
        labelSize.htmlFor = "size";
        container.append(labelSize);


        let inputSize = document.createElement("input");
        inputSize.id = "size";
        inputSize.type = "text";
        inputSize.required = true;
        inputSize.pattern = "^[0-9]+([.][0-9])*$";
        inputSize.classList.add(...["border-black", "border-2", "pl-3"]);
        container.append(inputSize);


        typeprams.append(container);


        typemessage.innerText = "  “Please, provide size”  ";


    } else if (type == "Furniture") {

        let container = document.createElement("div");
        container.classList.add(...["m-5", "grid", "grid-cols-2"]);

        let labelHeight = document.createElement("label");
        labelHeight.innerText = "Height (CM)";
        labelHeight.htmlFor = "height";
        container.append(labelHeight);


        let inputHeight = document.createElement("input");
        inputHeight.id = "height";
        inputHeight.type = "text";
        inputHeight.required = true;
        inputHeight.pattern = "^[0-9]+([.][0-9])*$";
        inputHeight.classList.add(...["border-black", "border-2", "pl-3"]);
        container.append(inputHeight);
        typeprams.append(container);



        container = document.createElement("div");
        container.classList.add(...["m-5", "grid", "grid-cols-2"]);

        let labelWidth = document.createElement("label");
        labelWidth.innerText = "Width (CM)";
        labelWidth.htmlFor = "width";
        container.append(labelWidth);

        let inputWidth = document.createElement("input");
        inputWidth.id = "width";
        inputWidth.type = "text";
        inputWidth.required = true;
        inputWidth.pattern = "^[0-9]+([.][0-9])*$";
        inputWidth.classList.add(...["border-black", "border-2", "pl-3"]);
        container.append(inputWidth);
        typeprams.append(container);


        container = document.createElement("div");
        container.classList.add(...["m-5", "grid", "grid-cols-2"]);

        let labelLength = document.createElement("label");
        labelLength.innerText = "Length (CM)";
        labelLength.htmlFor = "length";
        container.append(labelLength);

        let inputLength = document.createElement("input");
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


document.querySelector("#save").onclick = function(event) {
    submit.click();
    console.log("Submitted!");



}