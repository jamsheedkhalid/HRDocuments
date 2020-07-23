// FILL YEARS
// alert("years");
let yearsArray = [];
httpyears = new XMLHttpRequest();
httpyears.onreadystatechange = function () {
  if (this.readyState === 4) {
    let str = this.responseText;
    yearsArray = str.split("\t");
  }
};
httpyears.open("GET", "db/years.php", false);
httpyears.send();
let years_select = document.getElementById("years");
var length = years_select.options.length;
for (i = length - 1; i >= 0; i--) {
  years_select.options[i] = null;
}
for (i = 0; i < yearsArray.length - 1; i++) {
  years_select.add(new Option(yearsArray[i]));
}

// FILL CLASSES
// alert("classes");
let classesArray = [];
httpclasses = new XMLHttpRequest();
httpclasses.onreadystatechange = function () {
  if (this.readyState === 4) {
    let str = this.responseText;
    // document.getElementById("debug").innerHTML = this.responseText;
    classesArray = str.split("\t");
  }
};
httpclasses.open("GET", "db/classes.php", false);
httpclasses.send();
let classes_select = document.getElementById("classes");
var length = classes_select.options.length;
for (i = length - 1; i >= 0; i--) {
  classes_select.options[i] = null;
}
for (i = 0; i < classesArray.length - 1; i++) {
  classes_select.add(new Option(classesArray[i]));
}

// FILL SECTIONS
// alert("sections");
let sectionsArray = [];
httpsections = new XMLHttpRequest();
httpsections.onreadystatechange = function () {
  if (this.readyState === 4) {
    let str = this.responseText;
    // document.getElementById("debug").innerHTML = this.responseText;
    sectionsArray = str.split("\t");
  }
};
httpsections.open("GET", "db/sections.php", false);
httpsections.send();
let sections_select = document.getElementById("sections");
var length = sections_select.options.length;
for (i = length - 1; i >= 0; i--) {
  sections_select.options[i] = null;
}
for (i = 0; i < sectionsArray.length - 1; i++) {
  sections_select.add(new Option(sectionsArray[i]));
}
// FILL SUBJECTS
// alert("sections");
let subjectsArray = [];
httpsubjects = new XMLHttpRequest();
httpsubjects.onreadystatechange = function () {
  if (this.readyState === 4) {
    let str = this.responseText;
    // document.getElementById("debug").innerHTML = this.responseText;
    subjectsArray = str.split("\t");
  }
};
httpsubjects.open("GET", "db/subjects.php", false);
httpsubjects.send();
let subjects_select = document.getElementById("subjects");
var length = subjects_select.options.length;
for (i = length - 1; i >= 0; i--) {
  subjects_select.options[i] = null;
}
for (i = 0; i < subjectsArray.length - 1; i++) {
  subjects_select.add(new Option(subjectsArray[i]));
}

function search() {
  let year = document.getElementById("years").options[
    document.getElementById("years").selectedIndex
  ].text;
  let grade = document.getElementById("classes").options[
    document.getElementById("classes").selectedIndex
  ].text;
  let section = document.getElementById("sections").options[
    document.getElementById("sections").selectedIndex
  ].text;
  let subject = document.getElementById("subjects").options[
    document.getElementById("subjects").selectedIndex
  ].text;

  httpsearch = new XMLHttpRequest();
  httpsearch.onreadystatechange = function () {
    if (this.readyState === 4) {
      document.getElementById("result").innerHTML = this.responseText;
    }
  };
  httpsearch.open(
    "GET",
    "db/search.php?year=" +
      year +
      "&grade=" +
      grade +
      "&section=" +
      section +
      "&subject=" +
      subject,
    false
  );
  httpsearch.send();
}
