const picker = new EmojiButton();
const emoji_btn = document.querySelector('#emoji-btn');

picker.on('emoji', selection => {
  // `selection` object has an `emoji` property
  // containing the selected emoji
  document.querySelector('input').value+=selection;
});

emoji_btn.addEventListener('click', () => picker.togglePicker(emoji_btn));