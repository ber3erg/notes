
function make_active_or_dis(note_id){
    note = document.getElementById(note_id);
    if(note.classList.contains('active_note')){
        note.classList.remove('active_note');
    } 
    else {
        note.classList.add('active_note')
    }
}