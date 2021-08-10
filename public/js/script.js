function search() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i + 1].style.display = "none";
      }
    }
  }
}

function isInputEmpty() {
  inputs = document.querySelectorAll("input");
  submit = document.querySelector('[type="submit"]');
  y = inputs.length;
  x = 0;
  console.log("y = " + y);
  inputs.forEach((element) => {
    if (element["value"].length > 0) {
      y--;
    }
    if (element["value"].length == 0) {
      y++;
    }

    if (0 == y) {
      console.log("OK");
      submit.classList.remove("disabled", "btn-secondary");
    } else {
      submit.classList.add("disabled", "btn-secondary");
    }
  });
}

function filed() {
  submit = document.querySelector('[type="submit"]');
  submit.classList.remove("disabled", "btn-secondary");
}
