//#region AJAX - USERS

/*  FILL USER INFO FROM AJAX */
let fillUserInfo = obj => {
  $('#update-first-name').val(obj.firstName)
  $('#update-last-name').val(obj.lastName)
  $('#update-email').val(obj.email)
  $('#update-username').val(obj.username)
  let options = Array.from($('#favorite-team>option').map(function () {
    return $(this).val()
  }))
  options.forEach(option => {
    if (obj.favouriteTeam === option) {
      $(`#favorite-team option[value="${obj.favouriteTeam}"]`).attr('selected', 'selected')
    }
  })
  let active = parseInt(obj.active)
  if (active === 1) {
    $('#activeUser').attr('checked', true)
  } else {
    $('#activeUser').attr('checked', false)
  }
  $('#uid').val(obj.userID)
}

let addUserAjax = obj => {
  $.ajax({
    type: 'POST',
    url: `../includes/models/users/insert.php`,
    data: addUserInfo() ,
    dataType: 'json',
    success: response => {
      console.log(response)
      clearaddUserInfo()
      $('#active').val(0)
      
    },
    error: (xhr, status, err) => console.log(xhr)
  })
}

/* UPDATE USER INFO */
let updateUserAjax = obj => {
  $.ajax({
    method: 'POST',
    url: '../includes/models/users/update.php',
    data: obj,
    dataType: 'json',
    success: res => {
      if (res === undefined) {
        $('#updateHeading').text('You have successfully updated the user') //You have successfully updated the user'
        $('.updateHeader').addClass('success-color animated fadeIn')
        setTimeout(() => {
          $('.updateHeader').removeClass('success-color animated fadeIn')
          $('#updateUser').modal('hide')
          $('#updateHeading').text('User info') //You have successfully updated the user'  
        }, 1500)
      }
    },
    error: (xhr, status, err) => {
      console.log(err)
    }
  })
}

/* GET USER INFO */
let getUserInfo = id => {
  $.ajax({
    type: 'POST',
    url: `../includes/models/users/select.php`,
    data: { id, update: 'update' },
    success: response => {
      let obj = JSON.parse(response)
      fillUserInfo(obj)
    },
    error: (xhr, status, err) => console.log(xhr)
  })
}

/* DELETE USER */
let deleteUser = id => {
  $.ajax({
    type: 'POST',
    url: `../includes/models/users/delete.php`,
    data: { id, delete: 'delete' },
    success: response => console.log(response),
    error: (xhr, status, err) => console.log(xhr)
  })
}
//#endregion

//#region REGISTER FIELDS
const insertFields = [
  {
    id: 'insert-first-name',
    regExp: /^[A-ZŽŠĐČĆ][a-zžšđćč]{2,}$/,
    state: undefined, // true/false
    hint: 'help-first-name',
    error: { empty: 'First name must not be empty', invalid: 'First name must start with uppercase letter' }
  },

  {
    id: 'insert-last-name',
    regExp: /^[A-ZŽŠĐČĆ][a-zžšđćč]{4,40}(\s[A-ZŽŠĐČĆ][a-zžšđćč]{5,})?$/,
    state: undefined, // true/false
    hint: 'help-last-name',
    error: {
      empty: 'Last name must not be empty',
      invalid: 'Last name must start with uppercase letter'
    }
  },

  {
    id: 'insert-email',
    regExp: /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/,
    state: undefined, // true/false
    hint: 'help-email',
    error: {
      empty: 'Email must not be empty',
      invalid: 'Invalid email'
    }
  },

  {
    id: 'insert-username',
    regExp: /^[0-9a-zA-Z]{4,}$/,
    state: undefined, // true/false
    hint: 'help-username',
    error: {
      empty: 'Username must not be empty',
      invalid: 'Username must be at least 4 characters long'
    }
  },

  {
    id: 'insert-password',
    regExp: /^[0-9a-zA-Z]{8,}$/,
    state: undefined, // true/false
    hint: 'help-password',
    error: {
      empty: 'Password must not be empty',
      invalid: 'Password must be at least 8 characters long'
    }
  },


  {
    id: 'favorite-team',
    regExp: /^[1-9]+$/,
    state: undefined,
    hint: 'help-team',
    error: {
      empty: 'Team must be selected',
      invalid: ''
    }
  }
]
//#endregion

//#region HELPER
const addUserInfo = () => {
  return {
    firstName: document.querySelector('#insert-first-name').value,
    lastName: document.querySelector('#insert-last-name').value,
    email: document.querySelector('#insert-email').value,
    username: document.querySelector('#insert-username').value,
    password: document.querySelector('#insert-password').value,
    favoriteTeam: document.querySelector('#favorite-team').value,
    addUserInfo: 'addUserInfo' // dodati button i select value
  }
}

const clearaddUserInfo = () => {
  let firstName = document.querySelector('#insert-first-name').value = ''
  let lastName = document.querySelector('#insert-last-name').value = ''
  let email = document.querySelector('#insert-email').value = ''
  let username = document.querySelector('#insert-username').value = ''
  let password = document.querySelector('#insert-password').value = ''
  let favoriteTeam = document.querySelector('#favorite-team').value = '0'
  let active = document.querySelector('#active').value = '0'
}

let showHint = field => {
  let hintPlaceholder = document.querySelector(`#${field.hint}`)
  if (field.state === false) {
    hintPlaceholder.textContent = field.error.invalid
    hintPlaceholder.className = 'form-text text-danger'
  } else if (field.state === null) {
    hintPlaceholder.textContent = field.error.empty
    hintPlaceholder.className = 'form-text text-danger'
  }
}

let hideHint = field => {
  let hintPlaceholder = document.querySelector(`#${field.hint}`)
  if (!field.state) {
    hintPlaceholder.textContent = ''
    hintPlaceholder.className = 'form-text'
  }
}

let checkField = field => {
  field.value = document.querySelector(`#${field.id}`).value
  if (field.value) {
    field.regExp.test(field.value) ? field.state = true : field.state = false
  } else {
    field.state = null
  }
}

//#endregion


$(function () {
  let id
  //  DELETE USER
  $('.deleteUser').on('click', function (e) { // show.bs.modal
    let userID = $(this).attr('data-id')
    id = userID
    $('.confirm-delete').on('click', (id) => {
      $('#deleteUser').modal('hide')
      let element = e.target.parentElement.parentElement
      element.className = 'animated fadeOut'
      setTimeout(() => element.remove(), 350)
    })
    deleteUser(id)
    console.log(id)
  })
  // ADD NEW USER
  $('#addUser').click(function () {
    let active = ($('#active:checked').val() === undefined) ? 0 : Number($('#active:checked').val())
    const invalidFields = insertFields.filter(field => !field.state)
    console.log(invalidFields)
    console.log(`ACTIVE pre ifa`,active);
    
    if (invalidFields.length === 0) {
      console.log(active)
      //console.log(addUserInfo())
      addUserAjax(addUserInfo())
    console.log(`ACTIVE if`,active);

    } else {
      $('#addUserHeading').text('Invalid informations')
        $('.addUserHeader').addClass('danger-color animated fadeIn')
        setTimeout(() => {
          $('.addUserHeader').removeClass('danger-color animated fadeIn')
 
          $('#addUserHeading').text('Add new user')  
        }, 1500)
    }
    
    //addUserAjax(addUserInfo())
    clearaddUserInfo()
  })


  $('.confirm-delete').on('click', (id) => console.log(id))

  $('.updateUser').click(function () {
    let id = $(this).attr('data-id')
    let data = getUserInfo(id)
    console.log(data)
    try {
      fillUserInfo(data)
    } catch (error) {
      console.log('Error: ', error.message)
    }
    //$('#update-first-name').val(data.firstName)

  })

  $('#updateInfoUser').click(() => {
    let activeCheck = ($('#activeUser')[0].checked) ? 1 : 0
    let obj = {
      userID: parseInt($('#uid').val()),
      firstName: $('#update-first-name').val(),
      lastName: $('#update-last-name').val(),
      email: $('#update-email').val(),
      username: $('#update-username').val(),
      favouriteTeam: $('#favorite-team').val(),
      active: activeCheck,
      update: 'update'
    }
    updateUserAjax(obj)
  })

  $('#activeUser').change(() => {
    console.log($(this).val())

  })
  
  insertFields.forEach((field, i) => {
    let fieldElement = document.querySelector(`#${field.id}`)
    fieldElement.addEventListener('blur', () => {
      checkField(field)
      showHint(field)
    })
    fieldElement.addEventListener('focus', () => hideHint(field))
  })

})