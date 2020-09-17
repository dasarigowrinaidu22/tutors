$('form[id="newCourseForm"]').validate({
  rules: {
    main_title: 'required',
    sub_title: 'required',
    
  },
  messages: {
    main_title: 'This field is required',
    sub_title: 'This field is required',
   
  },
  submitHandler: function(form) {
    form.submit();
  }
});