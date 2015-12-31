# Bulutfon API Dökümantasyonu

**REST** mimarisinde tasarlanmış Bulutfon API'si, serileştirme için **JSON**, yetkilendirme için **OAuth 2** kullanır.

Endpointleri canlı ortamda deneyebileceğiniz [Bulutfon Api Dokümanını](http://api.bulutfon.com/docs) inceleyebilirsiniz.

## Kimlik Doğrulama ve Yetkilendirme

### Uygulama oluşturma

**[https://bulutfon.com](https://bulutfon.com)** adresindeki kullanıcı bilgileriniz ile panelinize giriş yaptıktan sonra. **Uygulamalar** menüsünün altında **API Uygulamaları > Yeni Uygulama Oluştur** diyerek forma uygulama adı ve token'ınızın döneceği callback url'i girip uygulamanızı oluşturun.

* Uygulamada vereceğiniz yönlendirme adresi 'https' olmalıdır. Development ortamında test edebilmek için **[ngrok](https://ngrok.com/)** kullanabilirsiniz.

* Uygulama oluşturulduktan sonra, **Yetkilendir** butonuna basarak erişim izni verin.

* Bu işlemlerin ardından authorization kodunuz yönlendirme adresi olarak tanımladığınız url'e **code** parametresi ile gönderilecektir.

* Son olarak bu gelen değeri

    * client_id = Uygulama Anahtarı
    * client_secret = Gizli Anahtar
    * code = sistemden dönen authorization kodunuz
    * redirect_uri = Yönlendirme url'iniz
    * grant_type = authorization_code

    parametreleri ile **[https://bulutfon.com/oauth/token](https://bulutfon.com/oauth/token)** adresine **POST** edin.
* Sonuç olarak size aşağıdaki gibi bir access token dönecektir.

```json
    {
        "access_token":"16a1094343d0271126f25124fda4159717e29e8ca87068389792dbb554d24385",
        "token_type": "bearer",
        "expires_in": 7200,
        "refresh_token": "551f3f26dab1afd712c183399c93fab7846cf582c907263c4a7892c7a12cd02c",
        "scope": "cdr call_record",
        "created_at": 1429026419
    }
```

Tokenınızı aldıktan sonra **[https://api.bulutfon.com](https://api.bulutfon.com)** adresinden yapacağınız isteklere **access_token** parametresi ile bu tokenı ekleyerek
istek yapmanız gerekmektedir. Token'ın geçerlilik süresi 2 saattir. 2 saat sonra token'ınız zaman aşımına uğradığında yaptığınız isteklere

```json
    {
        "error": "Token expired"
    }
```

şeklinde bir yanıt dönecektir.
* Token'ınızı yenilemek için

    * client_id = Uygulama Anahtarı
    * client_secret = Gizli Anahtar
    * refresh_token = Size dönen json'daki refresh_token değeri
    * redirect_uri = Yönlendirme url'iniz
    * grant_type = refresh_token

    parametreleri ile **[https://bulutfon.com/oauth/token](https://bulutfon.com/oauth/token)** adresine **POST** edin.

## EndPoint'ler

* **[Me](https://github.com/bulutfon/documents/blob/master/API/endpoints/me.md)** - Santral, kullanıcı bilgileri
* **[Dids](https://github.com/bulutfon/documents/blob/master/API/endpoints/dids.md)** - Santrale bağlı telefon numaraları
* **[Extensions](https://github.com/bulutfon/documents/blob/master/API/endpoints/extensions.md)** - Dahililer
* **[Groups](https://github.com/bulutfon/documents/blob/master/API/endpoints/groups.md)** - Gruplar
* **[Cdrs](https://github.com/bulutfon/documents/blob/master/API/endpoints/cdr.md)** - Arama kayıtları
* **[Call Records](https://github.com/bulutfon/documents/blob/master/API/endpoints/call-records.md)** - Ses kayıtları
* **[Incoming Faxes](https://github.com/bulutfon/documents/blob/master/API/endpoints/incoming-faxes.md)** - Gelen fakslar
* **[Outgoing Faxes](https://github.com/bulutfon/documents/blob/master/API/endpoints/outgoing-faxes.md)** - Giden fakslar
* **[Announcements](https://github.com/bulutfon/documents/blob/master/API/endpoints/announcements.md)** - Ses Dosyaları
* **[Automatic Calls](https://github.com/bulutfon/documents/blob/master/API/endpoints/automatic-calls.md)** - Otomatik Aramalar
* **[Message Titles](https://github.com/bulutfon/documents/blob/master/API/endpoints/message-titles.md)** - Mesaj Başlıkları
* **[Messages](https://github.com/bulutfon/documents/blob/master/API/endpoints/messages.md)** - Mesajlar

## Master Token Kullanarak istek yapmak

İsteklerinizi OAUTH 2 protokolü yerine direk master token kullanarak yapmak isterseniz, Panelden Uygulamalar > API Uygulamaları altında yer alan `Tekil Api Anahtarınızı` istek sırasında `access_token` parametresi ile göndererek apiye doğrudan erişebilirsiniz.

    https://api.bulutfon.com/cdrs?access_token={{master_token}} // Şeklinde

## Masaüstü Uygulamada Token Almak

Masaüstü uygulamanızda token almak hali hazırda bir webserver olmadığı için sorun yaratmaktadır. Bunu çözmek için:

* Uygulama oluştururken yönlendirme adresini `urn:ietf:wg:oauth:2.0:oob` olarak tanımlayın.
* Desktop uygulamanızda kullanıcınızı link ile veya uygulamanızın içerisinde bir browser açarak standart akışta da bulunan erişim isteyeceğiniz adrese yönlendirin.
* Kullanıcın erişimi onayladıktan sonra, yetkilendirme kodunun yazdığı html bir sayfaya yönlendirilecektir.
* Kullanıcıdan gördüğü erişim anahtarını bir textbox'a kopyalayıp yapıştırmasını isteyip, ardından bu değişkeni `code` parametresi olarak kullanarak access token'ınızı alabilirsiniz.
* Bu işlem tek seferlik olacaktır. Access token'ı bir kez aldığınız zaman yenilemek için refresh token yetecektir.

## XML Değil Sadece JSON Desteği

Sadece JSON formatını destekliyoruz. 

## İstek Limitleri

[429 Too Many Requests](http://tools.ietf.org/html/draft-nottingham-http-new-status-02#section-4)

## HTTP Statü Kodları

## Kütüphaneler & SDK'lar

* [php-sdk](https://github.com/bulutfon/php-sdk) - Composer paketi
* [ruby-sdk](https://github.com/bulutfon/ruby-sdk) - Ruby Gem
* [.Net-SDK](https://github.com/bulutfon/dotNet-SDK) - .NET-SDK için Nuget Paketi

## Açık Kaynak Projeler

* [ProjeKod/BulutfonWoocommerce](https://github.com/Projekod/Bulutfon-WooCommerce-Eklentisi) - [Projekod](http://projekod.com/) firmasının yaptığı Bulutfon **Woocommerce** eklentisidir. 
* [Projekod/BulutfonCart](https://github.com/Projekod/Bulutfon-Opencart-Eklentisi) - [Projekod](http://projekod.com/) firmasının yaptığı Bulutfon **Opencart** eklentisidir. 
* [Projekod/BulutfonCart-Lite](https://github.com/Projekod/BulutfonCart-Lite) - [Projekod](http://projekod.com/) firmasının yaptığı [Opencart](http://www.opencart.com/index.php?route=extension/extension/info&extension_id=21996) eklentisi. **ESKİ SÜRÜM**
* [hakanersu/bulutfon-whmcs](https://github.com/hakanersu/bulutfon-whmcs) - [Hakan Ersu](https://github.com/hakanersu)  tarafından geliştirdiği [Whmcs](http://whmcs.com/) eklentisi.

## Nasıl Yapılır Kılavuzları

* [Php, Curl kullanılarak Bulutfon'la SMS gönderme uygulaması](http://akademi.help/php-curl-kullanilarak-bulutfonla-sms-gonderme-uygulamasi/), Hüseyin Tunç
* [Php, Curl ile Bulutfon API'sini kullanarak dahili listesini göstermek](http://akademi.help/php-curl-ile-bulutfon-apisini-kullanarak-dahili-listesini-gostermek/), Hüseyin Tunç

## Daha iyisini yapmamız için geri bildirimde bulunun!

Lütfen bizlere daha iyi bir API'yi nasıl yapacağımızı söyleyin, geri bildirimde bulunun. Eğer API'de bir özelliğe ihtiyacınız varsa veya bir hata bulduysanız, lütfen [geliştirici formuna](http://devforums.bulutfon.com/c/api) konu açın. 
