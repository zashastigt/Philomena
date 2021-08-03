var optionboxesChecked = [];
var optionboxesUnique = [];
const afspraak_form = Vue.createApp({
  data() {
    return {
      dienst: true,
      behandeling: false,
      // datum_tijd: false,
      afrekenen: false,
      bevestiging: false,
      dnagels: false,
      dhaar: false,
      nav_behandeling: false,
      line: {
        width: '18%'
      },

      ns_n: 0,
      ns_fm: 0,
      ns_g: 0,
      nh_n: 0,
      nh_fm: 0,
      nh_g: 0,
      nh_k: 0,
      nh_gn: 0,
      nh_gpn: 0,
      h_m: 0,
      h_g: 0,
      h_mg: 0,
      v_s: 0,
      v_g: 0,
      v_gf: 0,
      v_sg: 0,
      d_k: 0,
      d_kdz: 0,
      d_km: 0,
      d_kmb: 0,
      d_kf: 0,
      d_wk: 0,
      d_wkdz: 0,
      d_wkm: 0,
      d_wmb: 0,
      d_wkf: 0,
      hr_k: 0,
      hr_wk: 0,
      k11_k: 0,
      k11_wk: 0,
      k11_wkd: 0,
      k12_s: 0,
      k12_g: 0,
      k12_gf: 0,
      k12_sg: 0,
      price: 0,
      EURprice: '€ 0',
      afspraken: '',
      dienst_info: 'empty',
    }
  },
  methods: {
    dienst_click() {
      this.dienst = true,
      this.behandeling = false,
      this.datum_tijd = false,
      this.afrekenen = false,
      this.bevestiging = false,
      this.line.width = '18%'
    },

    dienst_checked_check() {
      if ((document.getElementById("checkbox_dienst_nagels").checked == true) && (document.getElementById("checkbox_dienst_haar").checked == true)) {
        this.dienst_info = 'Nagels & Haar'
        this.dienst = false,
        this.behandeling = true,
        this.datum_tijd = false,
        this.afrekenen = false,
        this.bevestiging = false,
        this.line.width = '50%'
      } else if ((document.getElementById("checkbox_dienst_nagels").checked == false) && (document.getElementById("checkbox_dienst_haar").checked == true)) {
        this.dienst_info = 'Haar'
        this.dienst = false,
        this.behandeling = true,
        this.datum_tijd = false,
        this.afrekenen = false,
        this.bevestiging = false,
        this.line.width = '50%'
        document.getElementById("behandeling_nagels").style.display = "none"
      } else if ((document.getElementById("checkbox_dienst_nagels").checked == true) && (document.getElementById("checkbox_dienst_haar").checked == false)) {
        this.dienst_info = 'Nagels'
        this.dienst = false,
        this.behandeling = true,
        this.datum_tijd = false,
        this.afrekenen = false,
        this.bevestiging = false,
        this.line.width = '50%'
      } else {
        document.getElementById("dienst_error").style.display = "block"
      }
    },

    behandeling_click() {
      this.dienst = false,
      this.behandeling = true,
      // this.datum_tijd = false,
      this.afrekenen = false,
      this.bevestiging = false,
      this.line.width = '50%'

      document.getElementById("datum_tijd").style.visibility = "hidden"
      document.getElementById("datum_tijd").style.height = 0
    },

    datum_tijd_click() {
      if (this.price == 0) {
        document.getElementById("behandeling_error").style.display = "block";
      } else {
        this.dienst = false,
        this.behandeling = false,
        this.datum_tijd = true,
        this.afrekenen = false,
        this.bevestiging = false,
        this.line.width = '76%'
        document.getElementById("datum_tijd").style.visibility = "visible"
        document.getElementById("datum_tijd").style.height = "fit-content"  
      }     
    },

    afrekenen_click() {
      this.dienst = false,
      this.behandeling = false,
      this.datum_tijd = false,
      this.afrekenen = true,
      this.bevestiging = false,
      this.line.width = '97%'

      document.getElementById("datum_tijd").style.visibility = "hidden"
      document.getElementById("datum_tijd").style.height = 0
    },

    bevestiging_click() {
      this.dienst = false,
      this.behandeling = false,
      this.datum_tijd = false,
      this.afrekenen = false,
      this.bevestiging = true,
      this.line.width = '97%'
    },

    total_price(x, z) {
      var y = document.getElementById(x).checked;
      if (y == true) {
        this[x] = z
      } else {
        this[x] = 0
      };

      this.price =
      + this.ns_n
      + this.ns_fm
      + this.ns_g
      + this.nh_n
      + this.nh_fm
      + this.nh_g
      + this.nh_k
      + this.nh_gn
      + this.nh_gpn
      + this.h_m
      + this.h_g
      + this.h_mg
      + this.v_s
      + this.v_g
      + this.v_gf
      + this.v_sg
      + this.d_k
      + this.d_kdz
      + this.d_km
      + this.d_kmb
      + this.d_kf
      + this.d_wk
      + this.d_wkdz
      + this.d_wkm
      + this.d_wmb
      + this.d_wkf
      + this.hr_k
      + this.hr_wk
      + this.k11_k
      + this.k11_wk
      + this.k11_wkd
      + this.k12_s
      + this.k12_g
      + this.k12_gf
      + this.k12_sg;    

      this.EURprice = new Intl.NumberFormat('nl-NL', { style: 'currency', currency: 'EUR' }).format(this.price);
    },

    select_aub(v, w, x, y, z) {
      if (document.getElementById(v).checked == true) {
        if ((document.getElementById(w).checked == false) && (document.getElementById(x).checked == false) && (document.getElementById(y).checked == false)) {
          document.getElementById(z).style.display = "block";
        } else {
          document.getElementById(z).style.display = "none";
        }
      }
    },
    
    store_event() {
      var optionboxes = document.getElementsByClassName("option");

      for (var i=0; i<optionboxes.length; i++) {
        if (optionboxes[i].checked) {
            optionboxesChecked.push(optionboxes[i].value);
        }
      } 
      optionboxesUnique = optionboxesChecked.filter((v, i, a) => a.indexOf(v) === i);
      this.afspraken = optionboxesUnique
      console.log(this.afspraken)
      // console.log(optionboxesUnique)
    },
    
    create_event() {
      for (var i=0; i<optionboxesUnique.length; i++) {
        var div = document.createElement("div");
        div.innerHTML = optionboxesUnique[i];
        div.classList.add("fc-event");
        div.classList.add("fc-h-event");
        div.classList.add("fc-daygrid-event");
        div.classList.add("fc-daygrid-block-event");

        document.getElementById("event_box").appendChild(div);
      } 
    }
  }
});

afspraak_form.mount('#afspraak_form');
