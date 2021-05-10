import ClassicEditor from "@ckeditor/ckeditor5-build-classic";

export const textEditorInit = () => {
    ClassicEditor.create(document.querySelector(".editor")).catch((error) => {
        console.error(error);
    });
};
