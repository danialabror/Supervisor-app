<form action="{{ url('/schedule/update/'.$item->id) }}" method="POST">
    @csrf
        <div id="id03" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
                <div class="w3-center"><br>
                    <span onclick="document.getElementById('id03').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                </div>
                <div class="w3-container" >
                    <label style="margin-left: 20px"><h2>Add Schedule</h2></label>
                    <div class="w3-section">
                        <label style="padding-left: 17px">Nama Guru</label>
                        <select class="w3-select w3-border" style="width: 94%; margin-left:17px" name="participant">
                            <option value="{{$item->participant}}" selected>{{$item->user()->first()->name}}</option>
                            @foreach ($teachers as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        <br> <br>
                        <div class="w3-row-padding">
                            <div class="w3-half">
                                <label>Mata Pelajaran</label>
                                <input type="text" name="activity" class="w3-input w3-border" value="{{$item->activity}}">
                            </div>
                            <div class="w3-half">
                                <label>Kelas</label>
                                <input type="text" name="place" class="w3-input w3-border" value="{{$item->place}}">
                            </div>
                        </div>
                        <br>
                        <div class="w3-row-padding">
                            <div class="w3-half">
                                <label>Waktu</label>
                                <input type="datetime-local" name="time" class="w3-input w3-border" value="{{$item->time}}">
                            </div>
                            <div class="w3-half">
                                <label>Detail</label>
                                <input type="text" name="detail" class="w3-input w3-border" value="{{$item->detail}}">
                            </div>
                        </div>
                        <hr class="border-0">
                        <button class="w3-button w3-block w3-indigo w3-section w3-padding" style="width: 94%; margin-left:17px;" type="submit">Upload</button>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </form>