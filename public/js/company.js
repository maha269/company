function _(el) {
    return document.getElementById(el);
}

function preventDefault(e) {
    e.preventDefault();
    e.stopPropagation();
}

var companySelect = _("selected-company");
var companyTbody = _("employee-tbody");
companySelect.addEventListener("change", function () {
    for(var i = document.getElementById("employees-table").rows.length; i > 0;i--)
    {
        document.getElementById("employees-table").deleteRow(i -1);
    }
    var selectedCompanyId = this.value;
    console.log('hi');
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.response);
            console.log(data);
            data.forEach(myFunction);
            function myFunction(item, index) {
                var my_table = _("employees-table");
                var row = my_table.insertRow(-1);

                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);

                cell1.innerHTML = item.id;
                cell2.innerHTML = item.name;
                cell3.innerHTML = item.created_at;
            }

        }
    };
    xhttp.open("get", '/company/employees/'+selectedCompanyId, true);
    xhttp.send();
});

