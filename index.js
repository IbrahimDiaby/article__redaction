function init(){

    setTimeout(function (){
        document.getElementById('file_content').innerHTML = "Commencez votre redaction Ici...";
    }, 1000 );
    
}

function GotoSubmit(){

    var form = document.getElementById('forms');
    var content = document.getElementById('personal');
    content.value = window.document.getElementById('file_content').innerHTML;
    console.log(content.value);
    
    // setTimeout(function(){form.submit();}, 1000);
    
    form.submit();
}

function formatText(btn){
    var cible = document;

    switch(btn){
        case 'BackgroudColor':
        var color = prompt("Entrer le nom de la couleur (Anglais)");
        cible.execCommand('backColor', false, color);
        break;
        case 'couleur':
        var color = prompt("Entrer le nom de la couleur (Anglais)");
        cible.execCommand('foreColor', false, color);
        break;
        case 'b':
        cible.execCommand('bold', false, null);
        break;
        case 'i':
        cible.execCommand('italic', false, null);
        break;
        case 'u':
        cible.execCommand('underline', false, null);
        break;
        case 'taille':
        cible.execCommand('FontSize', false, null);
        break;
        case 'h1':
        cible.execCommand('formatBlock', false, 'h1');
        break;
        case 'h2':
        cible.execCommand('formatBlock', false, 'h2');
        break;
        case 'h3':
        cible.execCommand('formatBlock', false, 'h3');
        break;
        case 'h4':
        cible.execCommand('formatBlock', false, 'h4');
        break;
        case 'h5':
        cible.execCommand('formatBlock', false, 'h5');
        break;
        case 'h6':
        cible.execCommand('formatBlock', false, 'h6');
        break;
        case 'p':
        cible.execCommand('formatBlock', false, 'p');
        break;
        case 'redo':
        cible.execCommand('redo', false, null);
        break;
        case 'cut':
        cible.execCommand('cut', false, null);
        break;
        case 'blockquote':
        cible.execCommand('formatBlock', false, 'blockquote');
        break;
        case 'pre':
        cible.execCommand('formatBlock', false, 'pre');
        break;
        case 'newParagraph':
        cible.execCommand('insertParagraph', false, null);
        break;
        case 'superscript':
        cible.execCommand('superscript', false, null);
        break;
        case 'subscript' :
        cible.execCommand('subscript', false, null);
        break;
        case 'undo':
        cible.execCommand('undo', false, null);
        break;
        case 'left':
        cible.execCommand('justifyLeft', false, null);
        break;
        case 'right':
        cible.execCommand('justifyRight', false, null);
        break;
        case 'center':
        cible.execCommand('justifyCenter', false, null);
        break;
        case 'indent':
        cible.execCommand('indent', false, null);
        break;
        case 'outdent':
        cible.execCommand('outdent', false, null);
        break;
        case 'couleur':
        cible.execCommand('ForeColor', false, null);
        break;
        case 'ligne':
        cible.execCommand('inserthorizontalrule', false, null);
        break;
        case 'ul':
        cible.execCommand('InsertOrderedList', false, 'newUL');
        break;
        case 'ol':
        cible.execCommand('InsertUnorderedList', false, 'newOL');
        break;
        case 'lien':
        var lien = prompt("Entrer le lien : ");
        cible.execCommand('createLink', false, lien);
        break;
        case 'unlink':
        cible.execCommand('unlink', false, null);
        break;
        case 'image':
        var img = prompt("Entrer le lien de l'image : ");
        cible.execCommand('insertimage', false, img);
        break;
        case 'strikethrough':
        cible.execCommand('strikeThrough', false, null);
        break;
    }
}
    
// ****** ECOUTEUR D'EVENEMENT
//     document.addEventListener('selectionchange', handleSelectionChange, false);
//     document.addEventListener('select', handleSelectionChange, false);
    
// function handleSelectionChange(){
//     var selection = window.getSelection();
//     var text = selection.toString();
//     // console.log(text);
//     // selection.
//     console.log(selection);

//     // return text;
// }