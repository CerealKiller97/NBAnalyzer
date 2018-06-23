//#region Buttons
const contactBtn = document.querySelector('#contactBtn')
const sendBtn = document.querySelector('#sendBtn')
const registerBtn = document.querySelector('#registerBtn')
//#endregion
const BASE_URL = 'http://localhost/php1/NBAnalyzer-final/' //   https://taught-splice.000webhostapp.com/ //https://nbanalyzerapp.000webhostapp.com/
//#region fields for contact page
const fields = [
    {
      id: 'form-contact-Fname',
      regExp: /^[A-ZŽŠĐČĆ][a-zžšđćč]{2,}$/,
      state: undefined, // true/false
      hint: 'first-name-hint',
      error: { empty: 'First name must not be empty', invalid: 'Invalid first name' }
    },

  {
    id: 'form-contact-Lname',
    regExp: /^[A-ZŽŠĐČĆ][a-zžšđćč]{4,40}(\s[A-Z][a-zžšđćč]{5,})?$/,
    state: undefined,
    hint: 'last-name-hint',
    error: { empty: 'Last name must not be empty', invalid: 'Invalid last name' }
  },

  {
    id: 'form-contact-email',
    regExp: /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/,
    state: undefined,
    hint: 'email-hint',
    error: { empty: 'Email must not be empty', invalid: 'Invalid email' }
  },

  {
    id: 'form-contact-subject',
    regExp: /[A-Za-z0-9]{2,50}/,
    state: undefined,
    hint: 'subject-hint',
    error: { empty: 'Subject must not be empty', invalid: 'Invalid subject' }
  },

  {
    id: 'form-contact-message',
    regExp: /[A-Za-z0-9]{5,50}/,
    state: undefined,
    hint: 'message-hint',
    error: { empty: 'Message must not be empty', invalid: 'Invalid message' }
  }
]

/* LOGIN */

// INLINE VALIDATION
// Create an object of message 
const message = () => {
  return {
    firstName: document.querySelector('#form-contact-Fname').value,
    lastName: document.querySelector('#form-contact-Lname').value,
    email: document.querySelector('#form-contact-email').value,
    subject: document.querySelector('#form-contact-subject').value,
    messageField: document.querySelector('#form-contact-message').value,
    message: 'message'
  }
}

//#region Regular expressions
const reName = /^[A-Z][a-z]{3,20}(\s[A-Z][a-z]{2,15})?$/
const reLastName = /^[A-Z][a-z]{3,20}(\s[A-Z][a-z]{2,15})?$/
const reEmail = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/
//#endregion

let checkField = field => {
  field.value = document.querySelector(`#${field.id}`).value
  if (field.value) {
    field.regExp.test(field.value) ? field.state = true : field.state = false
  } else {
    field.state = null
  }
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

const clearFields = () => {
  let firstName = document.querySelector('#form-contact-Fname').value = ''
  let lastName = document.querySelector('#form-contact-Lname').value = ''
  let mail = document.querySelector('#form-contact-email').value = ''
  let subject = document.querySelector('#form-contact-subject').value = ''
  let message = document.querySelector('#form-contact-message').value = ''
}

let sendMessage = () => {
  const invalidFields = fields.filter(field => !field.state)

  if (invalidFields.length === 0) {
    //alert('You have successfully contacted us')
    $.ajax({
      method: 'POST',
      url: `${BASE_URL}includes/modules/send.php`,
      data: message(), // treba da posaljem i dugme da bi u php pitao da li je setovano
      dataType: 'json',
      success: response => {
        let feedback = document.querySelector('.alert')
        let modal = `<button id="alert" disabled class="btn btn-block btn-success">${response}</button>`
        feedback.innerHTML = modal
        feedback.classList.add('animated', 'fadeIn') // dodati ovaj blok u htmlu da se ne bi trzao sugavo onako
        // doraditi
        setTimeout(() => feedback.className = 'animated fadeOut', 5000)
        // Popup -> response
        clearFields()
      },
      error: (xhr, status, err) => {
        console.log(xhr.responseText)
        let feedback = document.querySelector('.alert')
        let modal = `<button id="alert" disabled class="btn btn-block btn-danger">${response}</button>`
        feedback.innerHTML = modal
        feedback.classList.add('animated', 'fadeIn')
        // doraditi
        setTimeout(() => feedback.className = 'animated fadeOut', 5000)
        /*switch (xhr.status) {
          case 500:
            // code
            break
        }*/
      }
    })
  }
}

/* REGISTER */

const registerFields = [{
    id: 'register-first-name',
    regExp: /^[A-ZŽŠĐČĆ][a-zžšđćč]{2,}$/,
    state: undefined, // true/false
    hint: 'help-first-name',
    error: { empty: 'First name must not be empty', invalid: 'First name must start with uppercase letter' }
  },

  {
    id: 'register-last-name',
    regExp: /^[A-ZŽŠĐČĆ][a-zžšđćč]{4,40}(\s[A-ZŽŠĐČĆ][a-zžšđćč]{5,})?$/,
    state: undefined, // true/false
    hint: 'help-last-name',
    error: { empty: 'Last name must not be empty', invalid: 'Last name must start with uppercase letter' }
  },

  {
    id: 'register-email',
    regExp: /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/,
    state: undefined, // true/false
    hint: 'help-email',
    error: { empty: 'Email must not be empty', invalid: 'Email must start with uppercase letter' }
  },

  {
    id: 'register-username',
    regExp: /^[0-9a-zA-Z]{4,}$/,
    state: undefined, // true/false
    hint: 'help-username',
    error: { empty: 'Username must not be empty', invalid: 'Username must be at least 4 characters long' }
  },

  {
    id: 'register-password',
    regExp: /^[0-9a-zA-Z]{8,}$/,
    state: undefined, // true/false
    hint: 'help-password',
    error: { empty: 'Password must not be empty', invalid: 'Password must be at least 8 characters long' }
  },


  {
    id: 'favorite-team',
    regExp: /^[1-9]+$/,
    state: undefined,
    hint: 'help-team',
    error: { empty: 'Team must be selected', invalid: '' }
  }
]

const registerInfo = () => {
  return {
    firstName: document.querySelector('#register-first-name').value,
    lastName: document.querySelector('#register-last-name').value,
    email: document.querySelector('#register-email').value,
    username: document.querySelector('#register-username').value,
    password: document.querySelector('#register-password').value,
    favoriteTeam: document.querySelector('#favorite-team').value,
    confirm: document.querySelector('#register-confirm').value,
    register: 'register' // dodati button i select value
  }
}

const clearRegister = () => {
  let firstName = document.querySelector('#register-first-name').value = ''
  let lastName = document.querySelector('#register-last-name').value = ''
  let email = document.querySelector('#register-email').value = ''
  let username = document.querySelector('#register-username').value = ''
  let password = document.querySelector('#register-password').value = ''
  let confirmPassword = document.querySelector('#register-confirm').value = ''
  let favoriteTeam = document.querySelector('#favorite-team').value = '0'
}

let registerUser = () => { 
    const invalidFields = registerFields.filter(field => !field.state)
 
  
    if (invalidFields.length === 0) {
      $.ajax({
        method: 'POST',
        url: `${BASE_URL}php/auth/registration.php`,
        data: registerInfo(),
        dataType: 'json',
        success: res => {
          console.log(res)
          let header = document.querySelector('.registerHeader')
          let info = document.querySelector('#info')
          header.classList.add('success-color', 'animated', 'fadeIn')
          info.innerHTML = res
          clearRegister()
        },
        error: (xhr, status, err) => { 
          console.log(xhr)          
          let header = document.querySelector('.registerHeader')
          let info = document.querySelector('#info')
          header.classList.add('danger-color', 'animated', 'fadeIn')
          info.innerHTML = xhr.responseJSON
          setTimeout(() => header.classList.remove('danger-color'), 2500)          
        }   
  })
} else {
    console.log('err') 
  }
}
 
let getResultsSurvey = () => {
  $.ajax({
    method: 'GET',
    url: `${BASE_URL}includes/models/answers/select.php`,
    dataType: 'json',
    success:  response => {
      
    }
  })
}


/* var animals = [
  { name: ‘Waffles’, type: ‘dog’, age: 12 },
  { name: ‘Fluffy’, type: ‘cat’, age: 14 },
  { name: ‘Spelunky’, type: ‘dog’, age: 4 },
  { name: ‘Hank’, type: ‘dog’, age: 11 },
];
var oldDogs = animals.filter(function(animal) {
  return animal.age > 10 && animal.type === ‘dog’;
}); */


let voteSurvey = () => {
  let suggestions = document.querySelectorAll('.suggestions')
  let resultSuggestion = suggestions.filter(suggestion => suggestion.value ) // sutra cu  
  console.log(resultSuggestion)
  
 let suggestionsArr = []
  suggestions.forEach(element => {
    let filter = element.value
    suggestionsArr.push(filter)
  })
  
  console.log(suggestionsArr)
  
  

  let voteHint = document.querySelector('#voteHint')
  let answers = document.getElementsByName('survey')
  let checked = null
  answers.forEach(answer => (answer.checked)? checked = answer.value : null)
  let id = document.querySelector('#userID').value
  let QuestionID = document.querySelector('#questionID').value
  if (checked !== null) {
    $.ajax({
      method: 'POST',
      url: `${BASE_URL}includes/models/answers/insert.php`,
      data: { checked:checked, id:id, questionID: QuestionID },
      dataType: 'json',
      success:  response => {
        const modal = document.querySelector('#modalPoll')
        const header = document.querySelector('#header')
        const colorHeader = document.querySelector('#colorHeader')
        colorHeader.classList.add('animated','fadeIn','success-color')
        header.textContent = response
        getResultsSurvey()
        let results = [
          {
            player: 'Michael Jordan',
            percent: 85
          },

          {
            player: 'Kobe Bryant',
            percent: 55
          },

          {
            player: 'LeBron James',
            percent: 35
          }
        ]
        let output = ``
        results.forEach(result => {
          output += `
            <div class="form-check mb-4 animated slideInDown">
              <p>${result.player}<span class="font-weight-bold res"> ${result.percent} % </span></p>
              <div class="progress" style="height: 20px">
                <div class="progress-bar" role="progressbar" style="width: ${result.percent}%; height: 20px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">${result.percent}</div>
              </div>
          </div>`    
        })    
        document.querySelector('.modal-body').innerHTML = output  
        voteHint.textContent = ''
        setTimeout(() => $(modal).modal('hide') , 10000)
      },
      error: (xhr, status, err) => console.log(xhr)
    })
    
  } else {
    voteHint.classList.add('animated','fadeIn')
    voteHint.textContent = 'You must select something' 
  }
}

let updateUser = e => e.preventDefault()



    window.onload = () => {
      const voteBtn = document.querySelector('#voteBtn')
      const contactBtn = document.querySelector('#contactBtn')
      registerBtn.addEventListener('click', registerUser)
      const updateUserBtn = document.querySelector('#updateUserBtn')
      try {
        voteBtn.addEventListener('click', voteSurvey)
        contactBtn.addEventListener('click', sendMessage)
        updateUserBtn.addEventListener('click', updateUser)
        fields.forEach((field, i) => {
          let fieldElement = document.querySelector(`#${field.id}`)
          fieldElement.addEventListener('blur', () => {
            checkField(field)
            showHint(field)
          })
          fieldElement.addEventListener('focus', () => hideHint(field))
        })
    } catch (error) {
        console.log('Error: ',error.message)  
    }
      registerFields.forEach(registerField => {
        let registerFieldElement = document.querySelector(`#${registerField.id}`)
        registerFieldElement.addEventListener('blur', () => {
          checkField(registerField)
          showHint(registerField)
        })
        registerFieldElement.addEventListener('focus', () => hideHint(registerField))
      })

    setTimeout(() =>  $('#modalPoll').modal('show') , 5000)  
}

