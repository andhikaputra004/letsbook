package com.example.andhika.letsbook.detil_event

import android.content.Intent
import android.os.Bundle
import android.support.v7.widget.Toolbar
import android.util.Log
import com.bumptech.glide.Glide
import com.example.andhika.letsbook.R
import com.example.andhika.letsbook.base.BaseActivity
import com.example.andhika.letsbook.belitiket.TransaksiActivity
import com.example.andhika.letsbook.ketentuan.KetentuanActivity
import com.example.andhika.letsbook.utils.changeDateFormat
import kotlinx.android.synthetic.main.activity_detail_event.*
import java.text.NumberFormat
import java.util.*

class DetilEventActivity : BaseActivity() {

    private val getBundle = Bundle()
    override fun onSetupLayout() {
        setContentView(R.layout.activity_detail_event)
        setupToolbarTitle(toolbar_layout as Toolbar, R.string.detail_event, R.drawable.ic_arrow_back_black_24dp)
    }

    override fun onViewReady() {
        val localeID = Locale("in", "ID")
        val formatRP = NumberFormat.getCurrencyInstance(localeID)
        val bundle = intent.extras
        tv_content_harga.text = formatRP.format(bundle.getString("HARGA_TIKET").toDouble()).toString()
        tv_content_lokasi.text = bundle.getString("LOKASI")
        tv_content_waktu.text = bundle.getString("TANGGAL").changeDateFormat("yyyy-MM-dd", "dd MMMM yyyy")
        tv_content_penyelenggara.text = bundle.getString("PENYELENGGARA")
        tv_content_sisa_tiket.text = "${bundle.getString("QUOTA").toInt() - bundle.getString("TERJUAL").toInt()}"
        Glide.with(this).load("http://192.168.43.150/letsbook/images/event/poster/${bundle.getString("GAMBAR")}")
            .into(iv_detil)
        tv_title.text = bundle.getString("NAMA_EVENT")
        tv_content_deskripsi.text = bundle.getString("DESKRIPSI")
        tv_content_contact.text = bundle.getString("KONTAK")
        iv_file.setOnClickListener {
            startActivity(Intent(this, KetentuanActivity::class.java))
        }
        Log.d("DHIKA", "RES: ${bundle.getString("ID_EVENT").toInt()}");
        getBundle.apply {
            putString("HARGA_TIKET", tv_content_harga.text.toString())
            putInt("ID_EVENT", bundle.getString("ID_EVENT").toInt())
            putString("LAYANAN", bundle.getString("LAYANAN"))
            putString("TANGGAL", tv_content_waktu.text.toString())
            putString("LOKASI", tv_content_lokasi.text.toString())
            putString("GAMBAR", bundle.getString("GAMBAR"))
        }

        btn_beli.setOnClickListener {
            startActivity(Intent(this, TransaksiActivity::class.java).apply {
                putExtras(bundle)
            })
            finish()
        }
    }
}