### CALL RECORD
===============

Arama kayıtlarına ait ses kayıtlarını alabileceğiniz endpointtir.

#### URL'ler

[Tam Liste](http://api.bulutfon.com/docs#!/Call_Record)

* `GET /call-records/uuid` Arama Kaydına ait ses kaydını file olarak gönderir
* `GET /call-records/uuid/stream` Arama Kaydına ait ses kaydını stream eder.

### Clientside teknolojilerde token, username veya password'ün korunması

Eğer stream veya indirme işlemini clientside bir teknolojide kullanıyorsanız (örneğin browser içinde Javascript ile) sizlere token, username password ve OAuth2 dışında sadece **Call Record** endpointti için ayrı bir authenticate yöntemi kurguladık. Token ve çağrının UUID'siyle yeni bir hash oluşturabilirsiniz.

Hash oluşturmak için istek yapılacak token ve uuid uç uca eklenerek sha1 ile hashlenir. ve access token parametresi ile gönderilebilir.

```
Ornek token = abcde123123
Ornek uuid = 1234-1234-1234
hash = sha1("abcde1231231234-1234-1234") #0abd013609331a5439f1865d20df1a8223bfd0fa
```

Gönderilecek url:

```
https://api.bulutfon.com/call-records/1234-1234-1234/stream?access_token=0abd013609331a5439f1865d20df1a8223bfd0fa #stream için için
https://api.bulutfon.com/call-records/1234-1234-1234?access_token=0abd013609331a5439f1865d20df1a8223bfd0fa #indirmek için
```
