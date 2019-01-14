
document.addEventListener('DOMContentLoaded', () => {
    const addButton = document.querySelector('#addButton');
    const commentArea = document.querySelector('#commentArea');
    const cancelButton = document.querySelector('#cancel');
    const form = document.querySelector('#commentArea');
    let count = 0;
    function createComment()
    {
        
        //element creation
        const formGroup = document.createElement('div')
            formGroup.setAttribute('class', 'form-group');
            formGroup.setAttribute('id', 'commentTag');

        //removed as getting username dynamcially
        //const labelName = document.createElement('label');
        //    labelName.textContent = 'Your Name';
        //    labelName.setAttribute('id', 'labelName');

        //removed as getting username dynamcially
        //const inputText = document.createElement('input');
        //    inputText.type = 'text';
        //    inputText.setAttribute('class', 'form-control');
        //    inputText.setAttribute('name', 'personName');

        const commentLabel = document.createElement('label');
            commentLabel.textContent = 'Please Leave your comment';
            commentLabel.setAttribute("id", 'commentLabel');
        
        const textArea = document.createElement('textarea');
            textArea.setAttribute('class', 'form-control');
            textArea.setAttribute('placeholder', 'Please enter comment');
            textArea.setAttribute('name', 'comment');
            

        const submitButton = document.createElement('button');
            submitButton.textContent = 'Post Comment';
            submitButton.type = 'submit';
            submitButton.setAttribute('class', 'btn btn-primary');
        
        //append elements to parent element
        commentArea.parentElement;
        commentArea.appendChild(formGroup);
        //formGroup.appendChild(labelName);
        //formGroup.appendChild(inputText);
        formGroup.appendChild(commentLabel);
        formGroup.appendChild(textArea);
        formGroup.appendChild(submitButton);
        addButton.textContent = 'Cancel Comment';
        addButton.setAttribute('id', 'cancel');

    }

    function clear()
    {
        
        //gets the created id elements
        var divComment = document.querySelector('#commentArea');
        var label = document.querySelector('#commentLabel');

        //set the commentArea as labels parent node
        divComment = label.parentNode;

        //remove the parent node and children
        form.removeChild(divComment);
    
        addButton.textContent = 'Add a Comment';
    }



    addButton.addEventListener('click', (e) => {

        if(e.target.textContent === 'Add a Comment' && event.target.tagName === 'BUTTON'){
            createComment();
        } else {
            clear();
        }
    

    });

});
