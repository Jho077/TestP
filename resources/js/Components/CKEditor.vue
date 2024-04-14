<template>
    <div id="app">
        <ckeditor :editor="editor" v-model="editorData"></ckeditor>
    </div>
</template>

<script>
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

    export default {
        props: ['contentEditor', 'config'],
        name: 'app',
        data() {
            return {
                editor: ClassicEditor,
                editorData: this.contentEditor,
            };
        }
    }
</script>