<p><strong>Nom :</strong> {{ $data['name'] }}</p>
<p><strong>Email :</strong> {{ $data['email'] }}</p>
<hr>
<p>{{ nl2br(e($data['message'])) }}</p>
