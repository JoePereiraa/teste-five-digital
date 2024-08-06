<div x-data="fileUploader()" class="wrapper">
    <header>File Uploader</header>
    <form @submit.prevent="checkAndSubmit" enctype="multipart/form-data" action="{{ route('file.upload') }}" method="POST">
        @csrf
        <div class="dash" @click="$refs.fileInput.click()">
            <input type="file" multiple @change="handleFiles" class="hidden" name="file" x-ref="fileInput">
            <img src="{{ asset('images/icons/ico_cloud.png') }}">
            <p x-if="fileName" x-text="fileName ? 'Arquivo Selecionado' : 'Arquivo para upload'"></p>
        </div>
       <div x-show="errorMessage" class="message-warning">
            <p x-text="errorMessage ?? ''"></p>
       </div>
        <section class="uploaded-area" x-show="fileName">
            <template x-if="fileName">
                <li class="row">
                    <div class="content">
                        <img src="{{ asset('images/icons/ico_file.png') }}">
                        <div class="details">
                            <span class="name" x-text="fileName"></span>
                            <span class="size" x-text="fileSize + ' KB'"></span>
                        </div>
                    </div>
                    <img src="{{ asset('images/icons/ico_check.png') }}">
                </li>
            </template>
        </section>
        <button type="submit" class="primary-button">Upload</button>
    </form>
</div>

