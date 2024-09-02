
@props([
    "subject" => "model"
])

<style>
.document-preview {
    background: white;
    height:100vh;
}

.a4-vertical {
    aspect-ratio: 0.7;
    margin: 2em auto 2em;
    padding:  1.5cm 2cm;
}

.document-preview {
    /* margin auto; */
}
</style>

<div class="document-preview a4-vertical" id="document-{{$subject}}-preview">
</div>
