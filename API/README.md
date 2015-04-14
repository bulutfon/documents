# Bulutfon API Dökümantasyonu

**Rest** mimarisinde tasarlanmış Bulutfon API'si, serilizasyon için **JSON**, doğrulama için **OAuth 2** kullanır.

## Kimlik Doğrulama ve Yetkilendirme

### Uygulama oluşturma

**[https://api.bulutfon.com](https://api.bulutfon.com)** adresinde kullanıcı bilgileriniz ile giriş yaptıktan sonra. **Uygulamalarım** menüsünün altında **Yeni Uygulama Oluştur** diyerek forma uygulama adı ve token'ınızın döneceği callback url'i girip uygulamanızı oluşturun.

* Uygulama oluşturulduktan sonra, **Yetkilendir** butonuna basarak erişim izni verin.

* Bu işlemlerin ardından authorization kodunuz yönlendirme adresi olarak tanımladığınız url'e **code** parametresi ile gönderilecektir.

* Son olarak bu gelen değeri

    * client_id = Uygulama Anahtarı
    * client_secret = Gizli Anahtar
    * code = sistemden dönen authorization kodunuz
    * redirect_uri = Yönlendirme url'iniz
    * grant_type = authorization_code

    parametreleri ile **[https://api.bulutfon.com/oauth/token](https://api.bulutfon.com/oauth/token)** adresine **POST** edin.
* Sonuç olarak size aşağıdaki gibi bir access token dönecektir.

    ```json
        {
            access_token: "16a1094343d0271126f25124fda4159717e29e8ca87068389792dbb554d24385"
            token_type: "bearer"
            expires_in: 7200
            refresh_token: "551f3f26dab1afd712c183399c93fab7846cf582c907263c4a7892c7a12cd02c"
            created_at: 1429026419
        }
    ```

Bu access_token'ı api'yi kullanırken her isteğe eklemeniz gerekmektedir. Token'ın geçerlilik süresi 2 saattir. 2 saat sonra refresh_token'ı kullanarak
tokenınızı yenileyebilirsiniz.

* Bunun için

    * client_id = Uygulama Anahtarı
    * client_secret = Gizli Anahtar
    * refresh_token = Size dönen json'daki refresh_token değeri
    * redirect_uri = Yönlendirme url'iniz
    * grant_type = refresh_token

    parametreleri ile **[https://api.bulutfon.com/oauth/token](https://api.bulutfon.com/oauth/token)** adresine **POST** edin.


## Sadece JSON Desteği
## İstek Limitleri

[429 Too Many Requests](http://tools.ietf.org/html/draft-nottingham-http-new-status-02#section-4)

## HTTP Statü Kodları
## Bölümler & Kapsamlar

* CDR (Call Detail Records) - Arama Kayıtları
* Records - Görüşme Ses Dosyaları

## Katkı Sağlayın
