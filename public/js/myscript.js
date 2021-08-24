// Code untuk Navbar (sidebar)
document.addEventListener("DOMContentLoaded", function (event) {
  const showNavbar = (toggleId, navId, bodyId, headerId) => {
    const toggle = document.getElementById(toggleId),
      nav = document.getElementById(navId),
      bodypd = document.getElementById(bodyId),
      headerpd = document.getElementById(headerId);

    // Validate that all variables exist
    if (toggle && nav && bodypd && headerpd) {
      toggle.addEventListener("click", () => {
        // show navbar
        nav.classList.toggle("show");
        // change icon
        toggle.classList.toggle("bx-x");
        // add padding to body
        bodypd.classList.toggle("body-pd");
        // add padding to header
        headerpd.classList.toggle("body-pd");
      });
    }
  };

  showNavbar("header-toggle", "nav-bar", "body-pd", "header");

  /*===== LINK ACTIVE =====*/
  const linkColor = document.querySelectorAll(".nav_link");

  function colorLink() {
    if (linkColor) {
      linkColor.forEach((l) => l.classList.remove("active"));
      this.classList.add("active");
    }
  }
  linkColor.forEach((l) => l.addEventListener("click", colorLink));
});

// fitur search data pada tabel
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

// Mengubah warna tombol submit jika data form sudah terisi
function isInputEmpty() {
  inputs = document.querySelectorAll(
    "input:not([type=file],[type=hidden],[type=submit])"
  );
  submit = document.querySelector('[type="submit"]');
  y = inputs.length;
  x = 0;
  inputs.forEach((element) => {
    if (element["value"].length > 0) {
      --y;
    }
    if (element["value"].length == 0) {
      ++y;
    }

    if (y <= 0) {
      submit.classList.remove("btn-secondary");
    } else {
      submit.classList.add("btn-secondary");
    }
  });
}

// Sama aja tapi untuk form tipe file
function filed() {
  submit = document.querySelector('input[value="Import"]');
  submit.classList.remove("btn-secondary");
  console.log("filed", submit);
}
