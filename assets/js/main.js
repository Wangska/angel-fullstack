let currentTab = 0;
      const tabs = document.querySelectorAll(".tab");

      function showTab(index) {
        tabs.forEach((tab, i) => {
          tab.classList.toggle("active", i === index);
        });
      }

      function nextTab() {
        if (currentTab < tabs.length - 1) {
          currentTab++;
          showTab(currentTab);
        }
      }

      function prevTab() {
        if (currentTab > 0) {
          currentTab--;
          showTab(currentTab);
        }
      }

      //other when clicked
      function clickOthers() {
        let civilStatusDropdown = document.getElementById("civilStatus");
        let otherStatusField = document.getElementById("otherStatus");
    
        if (civilStatusDropdown.value === "others") {
            otherStatusField.style.display = "block";
        } else {
            otherStatusField.style.display = "none";
        }
    }

    
    //table
    document.addEventListener("DOMContentLoaded", function () {
      const tableRows = document.querySelectorAll("tr");
  
      tableRows.forEach(tr => {
          tr.addEventListener("click", function (event) {
              event.stopPropagation();
              tableRows.forEach(row => row.classList.remove("selected"));
              this.classList.add("selected");
          });
      });
  
      document.addEventListener("click", function () {
          tableRows.forEach(row => row.classList.remove("selected"));
      });
  });
  

  //filter or sort
  document.querySelector('.filter-btn').addEventListener('click', function() {
    const table = document.getElementById('userTable');
    const rows = Array.from(table.getElementsByTagName('tr')).slice(1);
    rows.sort((a, b) => {
      const nameA = a.cells[1].textContent.toLowerCase(); 
      const nameB = b.cells[1].textContent.toLowerCase(); 
      return nameA.localeCompare(nameB); 
    });
  
   
    rows.forEach(row => table.appendChild(row));
  });
  

  //search
  function searchTable() {
   
    var input = document.getElementById('searchInput').value.toUpperCase();
    var table = document.getElementById('userTable');
    var rows = table.getElementsByTagName('tr');


    for (var i = 1; i < rows.length; i++) {
        var cells = rows[i].getElementsByTagName('td');
        var nameCell = cells[1]; 

        if (nameCell) {
            var name = nameCell.textContent || nameCell.innerText;
            if (name.toUpperCase().indexOf(input) > -1) {
                rows[i].style.display = "";
            } else {
                rows[i].style.display = "none";
            }
        }
    }
}

