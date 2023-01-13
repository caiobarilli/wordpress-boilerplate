
let selectElement = document.querySelector("#filter_sort > select");

if(selectElement)
{
    selectElement.addEventListener("change", submitForm);
}

function submitForm() {
    document.getElementById("filter_sort").submit();
}