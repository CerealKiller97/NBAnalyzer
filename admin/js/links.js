$(function () {

//#region AJAX - LINKS
  /* DELETE LINK */
  let deleteLink = id => {
    $.ajax({
      method: 'POST',
      url: `../includes/models/navigation/update.php`,
      data: { id, delete: 'delete' },
      dataType: 'json',
      success: response => console.log(response),
      error: (xhr, status, err) => console.log(xhr)
    })
  }
//#endregion

  let linkIDGlobalScope

  //    ADD LINK
  $('#addLinkBtn').click(() => {
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

    linkIDGlobalScope = linkID
    $('.confirm-deleteLink').on('click', id => { 
      console.log('co');
      
      $('#deleteLink').modal('hide')
      let element = e.target.parentElement.parentElement
      element.className = 'animated fadeOut'
      setTimeout(() => element.remove(), 350)
    })
    deleteLink(linkIDGlobalScope)
    console.log(linkIDGlobalScope)
  })
  
  // UPDATE LINK
})