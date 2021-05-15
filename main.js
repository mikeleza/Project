const popup = document.querySelector('.chat-popup');
const chatBtn = document.querySelector('.chat-btn');
const chatArea = document.querySelector('.chat-area');

//   chat button toggler 

chatBtn.addEventListener('click', ()=>{
    popup.classList.toggle('show');
})
