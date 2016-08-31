$(document).ready(function() {
	//signup validation
	$("#signupForm").validate({
		rules: {
			name: "required",
			password: {
				required: true,
				minlength: 5
			},
			password_confirmation: {
				required: true,
				minlength: 5,
				equalTo: "#password"
			},
			email: {
				required: true,
				email: true
			}
		}
	});
});	