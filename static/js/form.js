// State Selection
function stateselection() {
    var kerala = ["Palakkad", "Thrissur"];
    var manipur = ["Bishnupur", "Chandel"];
    var tamilnadu = ["Chennai", "Salem", "Coimbatore"];

    var sel = document.getElementById("state").value;
    var optList;
    console.log(sel);

    if (sel === "Kerala") {
        optList = kerala;
    } else if (sel === "Manipur") {
        optList = manipur;
    } else if (sel === "Tamil Nadu") {
        optList = tamilnadu;
    } else {
        alert("State not selected");
        return;
    }

    var citys = document.getElementById("city");
    var htmlString = "";
    for (var i = 0; i < optList.length; i++) {
        htmlString += "<option value='" + optList[i] + "'>" + optList[i] + "</option>";
    }
    console.log(htmlString);
    citys.innerHTML = htmlString;
}

// University Selection
function universityFun() {
    var chennai = [ "Anna University", "University of Madras"];
    var salem = [ "Anna University", "Periyar University"];
    var coimbatore = [ "Anna University", "Bharathiar University"];
    var bishnupur = [ "Asian International University", "Bir Tikendrajit University"];
    var chandel = [ "Central Agricultural University", "Dhanamanjuri University"];
    var palakkad = [ "University of Kerala"];
    var thrissur = [ "Kerala Agricultural University", "Mahatma Gandhi University"];

    var citylist = document.getElementById("city").value;
    var universitylist;
    console.log("university - ", citylist);
    if (citylist === "Chennai") {
        universitylist = chennai;
    } else if (citylist === "Salem") {
        universitylist = salem;
    } else if (citylist === "Coimbatore") {
        universitylist = coimbatore;
    } else if (citylist === "Palakkad") {
        universitylist = palakkad;
    } else if (citylist === "Thrissur") {
        universitylist = thrissur;
    } else if (citylist === "Bishnupur") {
        universitylist = bishnupur;
    } else if (citylist === "Chandel") {
        universitylist = chandel;
    } else {
        console.log("University Not selected");
    }

    var universitybox = document.getElementById("university");
    var universityStr = "";
    for (var i = 0; i < universitylist.length; i++) {
        universityStr += "<option value='" + universitylist[i] + "'>" + universitylist[i] + "</option>";
    }
    universitybox.innerHTML = universityStr;
}

// College Name Selection
function collegeName() {
    var chennaiAnnaUniversity = ["Chennai Anna University College"];
    var chennaiMadrasUniversity = ["VVR University of Madras"];
    var salemAnnaUniversity = ["AVS Engineering College"];
    var salemPeriyarUniversity = ["AVS College of Arts Science"];
    var cbeAnnaUniversity = ["Coimbatore Anna University College"];
    var cbeBharathiarUniversity = ["PSG Arts and science College"];
    var bishnupuraAsianuniversity = ["Bishnupur Engineering College"];
    var bishnupurBiruniversity = ["Bir Tikendrajit arts and science college"];
    var chendelCentraluniversity = ["Central Agricultural College"];
    var chendelDhanamanjuriuniversity = ["Dhanamanjuri Engineering College"];
    var palakkadKeraleuriuniversity = ["palakkad Arts and Science College"];
    var thrissurAgriuriuniversity = ["Mahatma Gandhi Engineering College"];
    var thrissurGandhiuriuniversity = ["Kerala Arts and Science College"];

    var universityList = document.getElementById("university").value;
    var collegeList;
    if (universityList === "Anna University") {
        collegeList = salemAnnaUniversity;
    } else if (universityList === "University of Madras") {
        collegeList = chennaiMadrasUniversity;
    } else if (universityList === "Anna University") {
        collegeList = salemAnnaUniversity;
    } else if (universityList === "Periyar University") {
        collegeList = salemPeriyarUniversity;
    } else if (universityList === "Anna University") {
        collegeList = cbeAnnaUniversity;
    } else if (universityList === "Bharathiar University") {
        collegeList = cbeBharathiarUniversity;
    } else if (universityList === "Asian International University") {
        collegeList = bishnupuraAsianuniversity;
    } else if (universityList === "Bir Tikendrajit University") {
        collegeList = bishnupurBiruniversity;
    } else if (universityList === "Central Agricultural University") {
        collegeList = chendelCentraluniversity;
    } else if (universityList === "Dhanamanjuri University") {
        collegeList = chendelDhanamanjuriuniversity;
    } else if (universityList === "University of Kerala") {
        collegeList = palakkadKeraleuriuniversity;
    } else if (universityList === "Kerala Agricultural University") {
        collegeList = thrissurAgriuriuniversity;
    } else if (universityList === "Mahatma Gandhi University") {
        collegeList = thrissurGandhiuriuniversity;
    } else {
        console.log("College Not selected");
    }

    var clgBox = document.getElementById("college");
    var clgStr = "";

    for (var i = 0; i < collegeList.length; i++){
        clgStr += "<option value='" + collegeList[i] + "'>" + collegeList[i] + "</option>";
    }
    clgBox.innerHTML = clgStr;
}





// Age calculation
function agecalculation() {
    var doc = document.getElementById("age")
    var dobstr = document.getElementById("dob").value
    var dob = new Date(dobstr)
    var current = new Date()
    var years = current.getFullYear() - dob.getFullYear()
    var months = current.getMonth() - dob.getMonth()
    var dates = current.getDate() - dob.getDate()
    if (dates < 0) {
        months--;
        dates += new Date(current.getFullYear(), current.getMonth(), 0).getDate();
    }
    if (months < 0) {
        years--;
        months += 12;
    }

    doc.value = years;
}

// phone number validation
function phonenumb(event) {
    const input = event.target;
    const value = input.value;
    const filter = value.replace(/\D/g, '');
    console.log(filter)
    input.value = filter
}
// Cancel Button 
var btn = document.getElementById('updateCancel');
btn.addEventListener('click', function() {
  document.location.href = 'form_validation.php';
});

// Image preview 

function imgPreview(){
    var img_preview = document.getElementById('imgPreview')
    var file = document.querySelector('input[type=file]').files[0]
    var reader = new FileReader()
    reader.onload = function(){
        img_preview.src = reader.result
    }
    if(file){
        reader.readAsDataURL(file);
    }
    else {
        img_preview.src="<?php echo 'http://localhost:8080/form_validation/static/img/'.$imgs; ?>";
    }
}

// Adding Event Listeners
document.getElementById("state").addEventListener("change", stateselection);
document.getElementById("city").addEventListener("change", universityFun);
document.getElementById("university").addEventListener("change", collegeName);
document.getElementById("dob").addEventListener("change", agecalculation);
document.getElementById("university").addEventListener("change", collegeName);



