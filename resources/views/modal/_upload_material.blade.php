<form action="{{ url('/material') }}" method="post" enctype="multipart/form-data">
@csrf
    <div id="id01" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
            <div class="w3-center"><br>
                <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
            </div>
            <div class="w3-container" >
                <div class="w3-section">
                    <label><b>Mata Pelajaran</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Masukan nama mapel" name="lesson" required>
                    <label><b>File (.Docs) *</b></label>
                    <input class="w3-input w3-border" type="file" name="docs" id="docs" required>
                    <button class="w3-button w3-block w3-indigo w3-section w3-padding" type="submit">Upload</button>
                </div>
            </div>
        </div>
    </div>
</form>