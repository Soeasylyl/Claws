@foreach($clients as $key => $client)
    <tr>
        <td> {{ $client->name }}</td>
        <td> {{ $client->description }}</td>
        <td> {{ $client->contacts }}</td>
        <td>
            <div class="clients__icon-wrapper">
                <div class="clients__edit-btn" data-id=" {{ $client->id }}"
                     data-name="{{ $client->name }}"
                     data-description="{{ $client->description }}"
                     data-contacts="{{ $client->contacts }}">
                    {!! file_get_contents(public_path('/images/svg/edit2.svg')) !!}
                </div>
                <div class="clients__trash-container">
                    <a href="{{ route('client.delete', ['id' => $client->id]) }}"
                       data-id="{{ $client->id }}">
                        <div class="clients__trash-icon">
                            {!! file_get_contents(public_path('/images/svg/trash-can.svg')) !!}
                        </div>
                    </a>
                    <form id="delete-form-{{ $client->id }}"
                          action="{{ route('client.delete', ['id' => $client->id]) }}"
                          method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        </td>
    </tr>
@endforeach
