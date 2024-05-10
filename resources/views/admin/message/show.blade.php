@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Сообщения</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Сообщение</label>
                            <div class="mes">
                                @foreach($messages as $message)
                                    <div class="item">
                                        <div>
                                            {{$message->created_at->diffForHumans()}}
                                        </div>
                                        {{$message->body}}
                                    </div>
                                @endforeach
                            </div>
                            <textarea id="message" name="message" class="form-control" rows="3"
                                      placeholder="Enter ..."></textarea>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="store(this)">Отправить</button>
                    </div>
                </div>
                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            console.log(window.Echo)
            window.Echo.channel(`store_message_{{$user->id}}`)
                .listen('.store_message', res => {
                    const wrp = $('.mes');
                    const item = `
                    <div class="item">
                    <div>
                        ${res.message.time}
                     </div>
                        ${res.message.body}
                    </div>
                    `
                    wrp.append(item);
                })
        })


        function store() {
            const message = $('#message').val();
            const authUserId = {{auth()->user()->id}};
            const url = '{{route('chat.store', $user->id)}}';
            const wrp = $('.mes');

            const data = {
                body: message,
                user_from: authUserId,
                user_to: {{$user->id}},
            }
            if(!message){
                return false
            }
            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-Token': '{{csrf_token()}}',
                },
                body: JSON.stringify(data)
            })
                .then(res => res.json())
                .then(res => {
                    const item = `
                    <div class="item">
                    <div>
                        ${res.time}
                     </div>
                        ${res.body}
                    </div>
                    `
                    wrp.append(item);
                    $('#message').val('')
                })
        }
    </script>
@endsection
