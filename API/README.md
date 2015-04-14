# Bulutfon API Dökümantasyonu

**Rest** mimarisinde tasarlanmış Bulutfon API'si, serilizasyon için **JSON**, doğrulama için **OAuth 2** kullanır.

## Kimlik Doğrulama ve Yetkilendirme

### Uygulama oluşturma

**[https://api.bulutfon.com](https://api.bulutfon.com)** adresinde kullanıcı bilgileriniz ile giriş yaptıktan sonra. **Uygulamalarım** menüsünün altında **Yeni Uygulama Oluştur** diyerek forma uygulama adı ve token'ınızın döneceği callback url'i girip uygulamanızı oluşturun.

* Uygulama oluşturulduktan sonra, **Yetkilendir** butonuna basarak erişim izni verin.

* Bu işlemlerin ardından authorization kodunuz yönlendirme adresi olarak tanımladığınız url'e **code** parametresi ile gönderilecektir.

* Son olarak bu gelen değeri

    * client_id = Uygulama Anaytarı
    * client_secret = Gizli Anahtar
    * code = sistemden dönen authorization kodunuz
    * redirect_uri = Yönlendirme url'iniz
    * grant_type = authorization_code

    parametreleri ile **[https://api.bulutfon.com/oauth/token](https://api.bulutfon.com/oauth/token)** adresine **POST** edin.
* Sonuç olarak size aşağıdaki gibi bir access token dönecektir.

    ```json
        {
            access_token: "7c6544da4929cb97842fe4ddc74bd13a457a7530cffa21ea980340c266f4df49"
            token_type: "bearer"
            expires_in: 7200
            created_at: 1429023681
        }
    ```

Bu access_token'ı api'yi kullanırken her isteğe eklemeniz gerekmektedir.


## Sadece JSON Desteği
## İstek Limitleri

[429 Too Many Requests](http://tools.ietf.org/html/draft-nottingham-http-new-status-02#section-4)

## HTTP Statü Kodları
## Bölümler & Kapsamlar

* CDR (Call Detail Records) - Arama Kayıtları
* Records - Görüşme Ses Dosyaları

## Katkı Sağlayın
