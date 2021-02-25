document.querySelector("#mass_delete").onclick = async function(event) {
    let toDelete = [];
    document.querySelectorAll(".product input[type=checkbox]").forEach(function(elem) {
        if (elem.checked) {

            toDelete.push(elem.value);

        }
    });

    // Delete Products

    massDelete('/scandiweb/product/massdelete', toDelete).then(function(response) {
            return response.json();
        })
        .then(function(body) {
            body.map((ElemtoDeleteFromUI) => {

                document.querySelector("#" + ElemtoDeleteFromUI).remove();

            });
        });

}

// Attaching Click Event for all product's div tag  
attachClickEvent()


/**
 * @return {void}
 */
function attachClickEvent() {
    document.querySelectorAll(".product").forEach(function(elem) {
        elem.onclick = function(event) {
            let checkbox = event.currentTarget.querySelector("input[type=checkbox]");
            checkbox.checked = !checkbox.checked;
        }
    });
}



/**
 * @param {String}url
 * @param {Array<string>}skuArray
 * 
 * @return {Promise}
 */
async function massDelete(url, skuArray) {
    let formData = new FormData();
    formData.append('skuArray', skuArray);

    return await fetch(url, { method: 'POST', body: formData })

}