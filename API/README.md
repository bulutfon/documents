# Bulutfon API Dökümantasyonu

**Rest** mimarisinde tasarlanmış Bulutfon API'si, serilizasyon için **JSON**, doğrulama için **OAuth 2** kullanır.

## Kimlik Doğrulama ve Yetkilendirme
* ### Uygulama oluşturma
	**[https://api.bulutfon.com](https://api.bulutfon.com)** adresinde kullanıcı bilgileriniz ile giriş yaptıktan sonra. **Uygulamalarım** menüsünün altında **Yeni Uygulama Oluştur** diyerek forma uygulama adı ve token'ınızın döneceği callback url'i girdikten sonra
	* Yetkilendir butonuna basarak veya
	* [https://api.bulutfon.com/oauth/authorize](https://api.bulutfon.com/oauth/authorize) adresine uygulama_id'si ve redirect_uri ile istek yaparak yetkilendirmeyi sağlayabilirsiniz.

	Örnek istek:

    ```
	    http://bulutfon-api.dev/oauth/authorize?client_id=app_id&redirect_uri=http%3A%2F%2Fbulutfon.com%2Fauth%2Fcallback&response_type=code

    ```

    Bu işlemlerin ardından authentication_token'ınız callback_uri olarak tanımladığınız url'e **code** parametresi ile gönderilecektir. Diğer isteklerinizi bu kod ile yapmanız gerekmektedir.
## Sadece JSON Desteği
## İstek Limitleri

[429 Too Many Requests](http://tools.ietf.org/html/draft-nottingham-http-new-status-02#section-4)

## HTTP Statü Kodları
## Bölümler & Kapsamlar

* CDR (Call Detail Records) - Arama Kayıtları
* Records - Görüşme Ses Dosyaları

## Katkı Sağlayın
