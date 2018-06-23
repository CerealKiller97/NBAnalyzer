$(document).ready(() => {
  const BASE_URL = 'http://localhost/php1/NBAnalyzer-final/' // https://taught-splice.000webhostapp.com // https://nbanalyzerapp.000webhostapp.com
  /* LOGIN */
  $('#email').keyup(() => {
    let email = $('#email').val()
    const reEmail = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/
    let emailHint = $('#email-hint')
    if (!email) {
      emailHint.text('Email must not be empty')
      emailHint.addClass('form-text text-danger')
      return false

    } else {
      if (!reEmail.test(email)) {
        emailHint.text('Invalid email format')
        emailHint.addClass('form-text text-danger')
        return false
      } else {
        emailHint.text('')
        emailHint.addClass('form-text')
        return true
      }
    }

  })
  /* LOGIN click */
  $('.stats').click(function () {
    let id = $(this).data('id')
    console.log(id)

    //getPlayerStats(id)

  })

  $('#password').keyup(() => {
    let password = $('#login-password').val()
    const rePassword = /^[A-z0-9]{6,20}$/
    let passwordHint = $('#password-hint')
    let passwordOk
    if (!password) {
      passwordHint.text('Password must not be empty')
      passwordHint.addClass('form-text text-danger')
      passwordOk = false
    } else {
      if (!reEmail.test(email)) {
        passwordHint.text('Wrong format')
        passwordHint.addClass('form-text text-danger')
        passwordOk = false
      } else {
        passwordHint.text('')
        passwordHint.addClass('form-text')
        passwordOk = true
      }
    }
    return passwordOk
  })



  $('#sendBtn').click(() => {
    let email = $('#email').val()
    const reEmail = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/
    let emailHint = $('#email-hint')
    if (!email) {
      emailHint.text('Email must not be empty')
      emailHint.addClass('form-text text-danger')
      emailOk = false
    } else {
      if (!reEmail.test(email)) {
        emailHint.text('Invalid email format')
        emailHint.addClass('form-text text-danger')
        emailOk = false
      } else {
        emailHint.text('')
        emailHint.addClass('form-text')
        emailOk = true

      }
    }

    let password = $('#login-password').val()
    const rePassword = /^[0-9a-zA-Z]{8,}$/
    let passwordHint = $('#password-hint')
    let passwordOk
    if (!password) {
      passwordHint.text('Password must not be empty')
      passwordHint.addClass('form-text text-danger')
      passwordOk = false
    } else {
      if (!rePassword.test(password)) {
        passwordHint.text('Wrong format')
        passwordHint.addClass('form-text text-danger')
        passwordOk = false
      } else {
        passwordHint.text('')
        passwordHint.addClass('form-text')
        passwordOk = true
      }
    }

    if (emailOk && passwordOk) {
      $.ajax({
        method: 'POST',
        url: `${BASE_URL}php/auth/login.php`,
        data: {
          login: 'login',
          email: $('#email').val(),
          password: $('#login-password').val()
        },
        dataType: 'json',
        success: response => {
          $('#hint').addClass('success-color animated fadeIn')
          $('.login-header').html(response)
          setTimeout(() => window.location.href = 'index.php?page=home', 1000)
        },
        error: (xhr, status, err) => {
          console.log('error')
          $('#hint').removeClass('primary-color')
          $('#hint').addClass('danger-color animated fadeIn')
          $('.login-header').text('Email and password do not match')
          setTimeout(() => {
            $('.login-header').text('Login')
            $('#hint').removeClass('danger-color')
            $('#hint').removeClass('animated fadeIn')
          }, 3000)
          $('#hint').addClass('primary-color animated fadeIn')
        }
      })
    } else {
      console.log('else')
      $('#hint').addClass('danger-color animated fadeIn')
      $('.login-header').text('Invalid email or password')
      setTimeout(() => {
        $('.login-header').text('Login')
        $('#hint').removeClass('danger-color animated fadeIn')       
      }, 3000)
      $('#hint').addClass('primary-color animated fadeIn')
    }
  })
})



function validateEmail() {
  // #region fields
  let email = $(this).val()
  const reEmail = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/
  let emailHint = $('#email-hint')
  // #endregion
  if (!email) {
    emailHint.text('Email must not be empty')
    emailHint.addClass('form-text text-danger')
    return false
  } else {
    if (!reEmail.test(email)) {
      emailHint.text('Invalid email format')
      emailHint.addClass('form-text text-danger')
      return false
    } else {
      emailHint.text('')
      emailHint.addClass('form-text')
      return true
    }
  }
}

let getPlayerStats = (id) => {
  $.ajax({
    method: 'GET',
    url: '',
    data: id,
    dataType: 'json',
    success: response => console.log(),
    error: (xhr, status, err) => console.log()
  })
}

let register = obj => {
  $.ajax({
    method: 'POST',
    url: 'includes/modules/registration.php',
    data: obj,
    dataType: 'json',
    success: data => console.log(data),
    error: (xhr, status, err) => console.log(xhr)
  })
}