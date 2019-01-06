package com.example.andhika.letsbook.fragment.content

import android.content.Intent
import android.os.Bundle
import android.support.v7.widget.LinearLayoutManager
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import com.bumptech.glide.Glide
import com.example.andhika.letsbook.R
import com.example.andhika.letsbook.common.GeneralRecyclerViewAdapter
import com.example.andhika.letsbook.detil_event.DetilEventActivity
import com.example.andhika.letsbook.model.EventRequest
import com.example.andhika.letsbook.model.EventResponse
import com.example.andhika.letsbook.model.Listevent
import dagger.android.support.DaggerFragment
import kotlinx.android.synthetic.main.fragment_main.*
import kotlinx.android.synthetic.main.viewholder_ticket.view.*
import javax.inject.Inject

class ContentFragment : DaggerFragment(), ContentContract.View {


    @Inject
    lateinit var presenter: ContentPresenter

    private val bundle = Bundle()
    private val listEvent = mutableListOf<Listevent>()

    private val listAdapter by lazy {
        GeneralRecyclerViewAdapter(R.layout.viewholder_ticket, listEvent, { model, _, _ ->
            bundle.apply {
                putString("PENYELENGGARA", model.namaOrganisasi)
                putString("HARGA_TIKET", model.hargaTiket)
                putString("NAMA_EVENT",model.namaEvent)
                putString("KONTAK",model.kontakInformasi)
                putString("TANGGAL",model.tanggalEvent)
                putString("JAM",model.jamEvent)
                putString("GAMBAR",model.gambarPoster)
                putString("LOKASI",model.lokasi)
                putString("QUOTA",model.quotaPeserta)
                putString("TERJUAL",model.tiketTerjual)
                putString("DESKRIPSI",model.deskripsiPenyelenggara)

            }
            startActivity(Intent(activity, DetilEventActivity::class.java).apply {
             putExtras(bundle)
            })
        }, { model, view ->
            Glide.with(this).load("http://192.168.43.150/letsbook/images/event/poster/${model.gambarPoster}")
                .into(view.iv_ticket)
            view.tv_location.text = model.lokasi
            view.tv_price.text = model.hargaTiket
            view.tv_title.text = model.namaEvent
        })
    }

    override fun onCreateView(inflater: LayoutInflater, container: ViewGroup?, savedInstanceState: Bundle?) =
        inflater.inflate(R.layout.fragment_main, container, false)

    override fun onViewCreated(view: View, savedInstanceState: Bundle?) {
        super.onViewCreated(view, savedInstanceState)
        presenter.takeView(this)
        lifecycle.addObserver(presenter)

        with(rv_list) {
            adapter = listAdapter
            layoutManager = LinearLayoutManager(activity, LinearLayoutManager.VERTICAL, false)
        }
    }
    override fun getListEvent(response: EventResponse) {
        listEvent.clear()
        response.listevent?.let { listEvent.addAll(it) }
        listAdapter.notifyDataSetChanged()
    }



    override fun onResume() {
        super.onResume()
        presenter.goToMain(EventRequest(1))
    }
}