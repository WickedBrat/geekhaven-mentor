function check(form) {
    if(form.answer.value == "benjaminfranklin") {
        alert("Scroll Down");
        document.getElementById("p2").style.display = "block";
    }
    else {
      alert("You're not doing it right!")
    }
  }