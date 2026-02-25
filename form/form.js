
    function dotask() {
        let t = document.getElementById("type").value;
        let t1 = document.getElementById("rent");
        let t2 = document.getElementById("marketprice");
        let t3 = document.getElementById("bhk");
        let t4 = document.getElementById("persons");
    
        // Reset the innerHTML content for all fields
        t1.innerHTML = "";
        t2.innerHTML = "";
        t3.innerHTML = "";
        t4.innerHTML = "";
    
        // Show inputs based on the selected type
        if (t === "rent_home") {
            t1.innerHTML = '<label for="rentamount">Rent Per Month</label><input type="number" name="rentamount" id="rentamount" min="1">';
            t3.innerHTML = '<label for="nbhk">BHK</label><input type="number" name="bhk" id="nbhk" min="1">';
        } else if (t === "sale_home") {
            t3.innerHTML = '<label for="nbhks">BHK</label><input type="number" name="nbhks" id="nbhks" min="1">';
            t2.innerHTML = '<label for="marketpriceh">Market Price</label><input type="number" name="marketpriceh" id="marketpriceh" min="1">';
        } else if (t === "rent_commerecial") {
            t1.innerHTML = '<label for="rentcomm">Rent Per Month</label><input type="number" name="rentcomm" id="rentcomm" min="1">';
        } else if (t === "sale_commerecial") {
            t2.innerHTML = '<label for="marketpricecomm">Market Price</label><input type="number" name="marketpricecomm" id="marketpricecomm" min="1">';
            console.log("ok");
        } else if (t === "hostel") {
            t1.innerHTML = '<label for="fees">Fees Per Year</label><input type="number" name="fees" id="fees" min="1">';
            t4.innerHTML = '<label for="numperson">No. Persons Per Room</label><input type="number" name="numperson" id="numperson" min="1">';
        }
    }
    
    // Initialize the form fields when the page loads
    document.addEventListener("DOMContentLoaded", function() {
        dotask(); // This ensures the default form setup is applied when the page loads
    
        let typeSelect = document.getElementById("type");
        if (typeSelect) {
            typeSelect.addEventListener("change", dotask);
        }
    });
    