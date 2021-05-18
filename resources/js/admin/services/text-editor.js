import ClassicEditor from "@ckeditor/ckeditor5-build-classic";


export const textEditorInit = () => {
    ClassicEditor.create(document.querySelector(".editor"),
    {

        toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h2', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h3', title: 'Heading 2', class: 'ck-heading_heading2' }
            ]
        },
        image: {

		}
    }).catch((error) => {
        console.error(error);
    });
};
