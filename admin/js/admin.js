/* const BASE_URL = 'http://localhost/githubNBAnalyzer/' //'http://nbanalyzer.infinityfreeapp.com'

let myFunction = element => $(element).attr('data-id') // za modaal da mu passujem data id iz delete btn klika



  /* a.k.a UPDATE USER */
  //$('#postBtn').click(() => {
    // console.log($('#draft')[0].checked) za checkiranje statusa
    //console.log($('#customFile')[0].files)
  //})
 
  /* LINKS */

  //let linkIDGlobal

  //    ADD LINK
/*   $('#addLinkBtn').click(function () {
    let page = $('#insert-link').val()
    let rePage = /^[A-Z][a-z]{2,}$/
    let ok = true
    if (!page) {
      $('#insert-link-hint').addClass('text-danger')
      $('#insert-link-hint').text('Page name must not be empty')
      ok = false
    } else if (!rePage.test(page)) {
      $('#insert-link-hint').addClass('text-danger')
      $('#insert-link-hint').text('Page name must start with capital letter')
      ok = false
    } else {
      $('#insert-link-hint').text('')
    }
    if (ok) {
      // AJAX CALL
      let linkObj = { page: page, href: page.toLowerCase(), addLink: 'AddLink' }
      $.ajax({
        method: 'POST',
        url: '../includes/models/navigation/insert.php',
        data: linkObj,
        dataType: 'json',
        success: response => {
          $('#insert-link-hint').text('')
          $('#insert-link').val('')
          $('#updateHeading').text(response)
          $('.updateHeader').addClass('success-color animated fadeIn')
          setTimeout(() => {
            $('.updateHeader').removeClass('success-color animated fadeIn')
            $('#updateUser').modal('hide')
            $('#updateHeading').text('Add link')
          }, 1500)
        },
        error: (xhr, status, err) => {
          console.log(err)
        }
      })
    } else {
      console.log('err')
    }
  })
  // DELETE LINK
  $('.deleteLink').on('click', function (e) { // show.bs.modal
    //var id = myFunction(this)
    let linkID = $(this).attr('data-id')
    console.log(linkID)
    
    linkIDGlobal = linkID
    $('.confirm-delete').on('click', id => {
      $('#deleteUser').modal('hide')
      let element = e.target.parentElement.parentElement
      element.className = 'animated fadeOut'
      setTimeout(() => element.remove(), 350)
    })
    deleteLink(linkIDGlobal)
    console.log(linkIDGlobal)
  }) */
