# Bulutfon API Dökümantasyonu

**Rest** mimarisinde tasarlanmış Bulutfon API'si, serilizasyon için **JSON**, doğrulama için **OAuth 2** kullanır.

## Kimlik Doğrulama ve Yetkilendirme

### Uygulama oluşturma

**[https://bulutfon.com](https://bulutfon.com)** adresindeki kullanıcı bilgileriniz ile panelinize giriş yaptıktan sonra. **Uygulamalar** menüsünün altında **API Uygulamaları > Yeni Uygulama Oluştur** diyerek forma uygulama adı ve token'ınızın döneceği callback url'i girip uygulamanızı oluşturun.

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

* **[Me](https://github.com/bulutfon/documents/blob/master/API/endpoints/me.md)**
* **[Dids](https://github.com/bulutfon/documents/blob/master/API/endpoints/dids.md)**
* **[Extensions](https://github.com/bulutfon/documents/blob/master/API/endpoints/extensions.md)**
* **[Groups](https://github.com/bulutfon/documents/blob/master/API/endpoints/groups.md)**
* **[Cdr](https://github.com/bulutfon/documents/blob/master/API/endpoints/cdr.md)**

## Sadece JSON Desteği
## İstek Limitleri

[429 Too Many Requests](http://tools.ietf.org/html/draft-nottingham-http-new-status-02#section-4)

## HTTP Statü Kodları

## Kütüphaneler & SDK'lar

* [php-sdk](https://github.com/bulutfon/php-sdk) - Composer paketi

## Katkı Sağlayın
