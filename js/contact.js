const contactBtn = document.querySelector('#contactBtn')
const BASE_URL = 'https://nbanalyzerapp.000webhostapp.com/' //   http://nbanalyzer.infinityfreeapp.com
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

let sendMessage = () => {  const invalidFields = fields.filter(field => !field.state)

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
        let modal = `<button id="alert" disabled class="btn btn-block btn-danger">Error server.Please try again</button>`
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
  } else {
    alert('Something went wrong')
    
  }
}

window.onload = () => {
  contactBtn.addEventListener('click', sendMessage)
  fields.forEach((field, i) => {
    let fieldElement = document.querySelector(`#${field.id}`)
    fieldElement.addEventListener('blur', () => {  
      
      checkField(field)
      showHint(field)
    })
    fieldElement.addEventListener('focus', () => hideHint(field))
  })
}