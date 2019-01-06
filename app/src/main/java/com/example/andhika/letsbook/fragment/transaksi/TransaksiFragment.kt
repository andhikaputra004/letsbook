package com.example.andhika.letsbook.fragment.transaksi

import android.content.Intent
import android.os.Bundle
import android.support.v7.widget.LinearLayoutManager
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import com.bumptech.glide.Glide
import com.example.andhika.letsbook.R
import com.example.andhika.letsbook.common.GeneralRecyclerViewAdapter
import com.example.andhika.letsbook.deps.SharedPreferenceHelper
import com.example.andhika.letsbook.fragment.detilTransaksi.DetilTransaksiActiviy
import com.example.andhika.letsbook.model.Listaktiftransaksi
import com.example.andhika.letsbook.model.TicketRequest
import com.example.andhika.letsbook.model.TicketResponse
import com.example.andhika.letsbook.utils.Costant
import dagger.android.support.DaggerFragment
import kotlinx.android.synthetic.main.fragment_transaksi.*
import kotlinx.android.synthetic.main.viewholder_transaksi.view.*

import javax.inject.Inject

class TransaksiFragment : DaggerFragment(), TransaksiContract.View {

    @Inject
    lateinit var presenter: TransaksiPresenter

    @Inject
    lateinit var sharedPreferenceHelper: SharedPreferenceHelper

    private val bundle = Bundle()
    private val listEvent = mutableListOf<Listaktiftransaksi>()

    private val listAdapter by lazy {
        GeneralRecyclerViewAdapter(R.layout.viewholder_transaksi, listEvent, { model, _, _ ->
            bundle.apply {
                putString("HARGA_TIKET", model.hargaTiket)
                putString("NAMA_EVENT",model.namaEvent)
                putString("KONTAK",model.kontakInformasi)
                putString("TANGGAL",model.tanggalEvent)
                putString("JAM",model.jamEvent)
                putString("GAMBAR",model.gambarPoster)
                putString("LOKASI",model.lokasi)
                putString("QUOTA",model.quotaPeserta)
                putString("TERJUAL",model.tiketTerjual)

            }
            startActivity(Intent(activity,DetilTransaksiActiviy::class.java).apply {
                putExtras(bundle)
            })
        }, { model, view ->
            Glide.with(this).load("http://192.168.43.150/letsbook/images/event/poster/${model.gambarPoster}")
                .into(view.iv_ticket)
            view.tv_price.text = model.hargaTiket
            view.tv_title.text = model.namaEvent
        })
    }


    override fun onCreateView(inflater: LayoutInflater, container: ViewGroup?, savedInstanceState: Bundle?) =
        inflater.inflate(R.layout.fragment_transaksi, container, false)

    override fun onViewCreated(view: View, savedInstanceState: Bundle?) {
        super.onViewCreated(view, savedInstanceState)
        presenter.takeView(this)
        lifecycle.addObserver(presenter)
        with(rv_list) {
            adapter = listAdapter
            layoutManager = LinearLayoutManager(activity,LinearLayoutManager.VERTICAL,false)
        }
    }

    override fun getListEvent(response: TicketResponse) {
        listEvent.clear()
        response.listaktiftransaksi?.let {
            listEvent.addAll(it)
        }
        listAdapter.notifyDataSetChanged()
    }

    override fun onResume() {
        super.onResume()
        presenter.goToMain(TicketRequest(sharedPreferenceHelper.getString(Costant.Common.ID_PELANGGAN).toInt()))

    }

}