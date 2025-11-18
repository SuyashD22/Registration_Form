$(document).ready(function() {
  $("#registrationForm").on("submit", function(e) {
    let valid = true;

    $("input, textarea, select").each(function() {
      if ($(this).val().trim() === "") {
        $(this).css("border", "2px solid red");
        valid = false;
      } else {
        $(this).css("border", "2px solid #e0e0e0");
      }
    });

    if (!valid) {
      alert("Please fill in all fields before submitting!");
      e.preventDefault();
    }
  });
});