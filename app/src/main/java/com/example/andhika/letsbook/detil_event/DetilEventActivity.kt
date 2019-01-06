package com.example.andhika.letsbook.detil_event

import android.content.Intent
import com.bumptech.glide.Glide
import com.example.andhika.letsbook.R
import com.example.andhika.letsbook.base.BaseActivity
import com.example.andhika.letsbook.ketentuan.KetentuanActivity
import kotlinx.android.synthetic.main.activity_detail_event.*
import java.text.NumberFormat
import java.util.*

class DetilEventActivity : BaseActivity() {

    override fun onSetupLayout() {
        setContentView(R.layout.activity_detail_event)
    }

    override fun onViewReady() {
        val localeID = Locale("in", "ID")
        val formatRP = NumberFormat.getCurrencyInstance(localeID)
        val bundle = intent.extras
        tv_content_harga.text = formatRP.format(bundle.getString("HARGA_TIKET").toDouble()).toString()
        tv_content_lokasi.text = bundle.getString("LOKASI")
        tv_content_penyelenggara.text = bundle.getString("PENYELENGGARA ")
        tv_content_sisa_tiket.text = "${bundle.getString("QUOTA").toInt() - bundle.getString("TERJUAL").toInt()}"
        Glide.with(this).load("http://192.168.43.150/letsbook/images/event/poster/${bundle.getString("GAMBAR")}")
            .into(iv_detil)
        tv_title.text = bundle.getString("NAMA_EVENT")
        tv_content_deskripsi.text = bundle.getString("DESKRIPSI")
        tv_content_contact.text = bundle.getString("KONTAK")
        iv_file.setOnClickListener {
            startActivity(Intent(this,KetentuanActivity::class.java))
        }
        btn_beli.setOnClickListener {
            startActivity(Intent(this,KetentuanActivity::class.java))
        }
    }
}