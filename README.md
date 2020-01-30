# Laravel Test

## Test List
1. SweetAlert2 + Animate CSS

<img src="sweetalert-ss.png" width=100%>

<br>

- Tabel Animate CSS
<img src="animate.png" style="text-align: center">

----------
- Penempatan file JS Sweetalert

Untuk sweetalert yang digunakan adalah yang `sweetalert.all.js` yang mana itu adalah hasil dari package **SweetAlert For Laravel** dari *realrashid*

```javascript
<script src="{{ asset('vendor/sweetalert/js/sweetalert.all.js')  }}"></script>
```
> Jadi untuk script nya di import ke main layout agar dapat di akses sweetalert yang di package dan sweetalert yang custom dibuat sendiri