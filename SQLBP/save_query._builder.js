// Save the textarea value in local storage
var textarea = document.getElementById("sql-query-builder");
textarea.addEventListener("input", function () {
  localStorage.setItem("sql-query-builderValue", textarea.value);
});

// Retrieve the saved textarea value from local storage
var savedValue = localStorage.getItem("sql-query-builderValue");
if (savedValue) {
  textarea.value = savedValue;
}
