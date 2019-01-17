package com.example.andhika.letsbook.belitiket

import android.annotation.SuppressLint
import android.content.Intent
import android.support.v7.widget.Toolbar
import android.util.Log
import com.bumptech.glide.Glide
import com.example.andhika.letsbook.R
import com.example.andhika.letsbook.base.BaseActivity
import com.example.andhika.letsbook.deps.SharedPreferenceHelper
import com.example.andhika.letsbook.main.Main2Activity
import com.example.andhika.letsbook.model.TransaksiRequest
import com.example.andhika.letsbook.model.TransaksiResponse
import com.example.andhika.letsbook.utils.Costant
import kotlinx.android.synthetic.main.activity_transaksi.*
import java.text.NumberFormat
import java.util.*
import javax.inject.Inject

class TransaksiActivity : BaseActivity() , TransaksiContract.View{

    @Inject
    lateinit var presenter: TransaksiPresenter

    @Inject
    lateinit var sharedPreferenceHelper: SharedPreferenceHelper

    override fun onSetupLayout() {
        setContentView(R.layout.activity_transaksi)
        setupToolbarTitle(toolbar_layout as Toolbar , R.string.transaksi,R.drawable.ic_arrow_back_black_24dp)
    }

    @SuppressLint("SetTextI18n")
    override fun onViewReady() {
        presenter.takeView(this)
        lifecycle.addObserver(presenter)
        val bundle = intent.extras

        val localeID = Locale("in", "ID")
        val formatRP = NumberFormat.getCurrencyInstance(localeID)

        Glide.with(this).load("http://192.168.43.150/letsbook/images/event/poster/${bundle.getString("GAMBAR")}")
            .into(iv_image)

        Log.d("DHIKA", "RES: ${bundle.getInt("ID_EVENT")}");
        tv_biaya_content.text = formatRP.format(bundle.getString("LAYANAN").toDouble())
        tv_harga_content.text = formatRP.format(bundle.getString("HARGA_TIKET").toDouble())
        tv_waktu_content.text = bundle.getString("TANGGAL")
        tv_lokasi_content.text = bundle.getString("LOKASI")
        tv_total_content.text = formatRP.format("${bundle.getString("LAYANAN").toDouble()+bundle.getString("HARGA_TIKET").toDouble()}".toDouble())
        val int = "${bundle.getString("LAYANAN").toInt()+bundle.getString("HARGA_TIKET").toInt()}".toInt()
        btn_trans.setOnClickListener {
            presenter.goToMain(TransaksiRequest(bundle.getString("ID_EVENT").toInt(),sharedPreferenceHelper.getString(Costant.Common.ID_PELANGGAN).toInt(),1,int))
        }
    }

    override fun doTransaksi(response: TransaksiResponse) {
        startActivity(Intent(this@TransaksiActivity,Main2Activity::class.java))
        finish()
    }
}